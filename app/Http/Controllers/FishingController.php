<?php

namespace App\Http\Controllers;

use App\Models\bulletin_board;
use App\Models\bulletin_board_contents;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Services\Fishing;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\PseudoTypes\False_;

class FishingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tag_ids = [];

        if(!empty($request->tag_ids)) {
            $q = DB::table('bulletin_boards')->orderBy('updated_at', 'desc');
            foreach($request->tag_ids as $index => $tag_id) {
                if($index == 0) {
                    $q->where('tag_id', $tag_id);
                }
                else {
                    $q->orwhere('tag_id', $tag_id);
                }
            }
            $data_all = $q->paginate(10);

            $tag_ids = $request->tag_ids;
        }
        else {
            $data_all = DB::table('bulletin_boards')->orderBy('updated_at', 'desc')->paginate(10);
        }

        // タグ名変更（本来はオブジェクトの中に入れたほうが後々楽になるよ）
        foreach($data_all as $data) {
            $data->tag_name = Fishing::tag_name($data->tag_id);
            $data->img = Fishing::img_set($data->tag_id);

            // 投稿内容取得
            $rtn = Fishing::card_display($data->id);
            $data->init_content = $rtn->content;
        }

        return view('fishing.boardlist', compact('data_all','tag_ids'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fishing.form_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 新規作成時のみ処理を実施
        if($request->has('create')) {
            // 入力チェック
            $validatedData = $request->validate([
                'title' => 'required|max:200',
                'tag' => 'required',
                'content' => 'required|max:500'
            ]);

            $bulletin_board = new bulletin_board();

            $bulletin_board->user_id = Auth::id();
            $bulletin_board->title = $request->title;
            $bulletin_board->tag_id = $request->tag;
            $bulletin_board->isClosed = FALSE;
            $bulletin_board->isDeleted = FALSE;
            $bulletin_board->tag_id = $request->tag;

            $bulletin_board->save();

            // この取得方法だと、同時に追加時ずれる可能性あり
            $id = bulletin_board::max('id');

            $bulletin_board_contents = new bulletin_board_contents();
            $bulletin_board_contents->parentid = intval($id);
            $bulletin_board_contents->content = $request->content;
            $bulletin_board_contents->isDeleted = FALSE;
            $bulletin_board_contents->user_id = Auth::id();
            $bulletin_board_contents->responseid = 0;

            $bulletin_board_contents->save();
        }

        return redirect('fishing/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // タイトルやタグ情報
        $display_info = DB::table('bulletin_boards')->where('id', $id)->first();
        $display_info->tag_name = Fishing::tag_name($display_info->tag_id);

        // チャット画面の投稿内容などのデータ
        $contents = DB::table('bulletin_board_contents')->where('parentid', $id)->get();

        // チャット画面の投稿ユーザー情報を取得
        foreach ($contents as $content) {
            $user_name = DB::table('users')->select('name')->where('id', $content->user_id)->first();
            $content->user_name = $user_name->name;

            // 返信ありのとき（@で始まり,で区切っているとき）
            if(preg_match("/^@/",$content->content) && preg_match("/,/",$content->content)) {
                // [0]返信先情報
                // [1]返信内容情報
                $res_content = explode(',',$content->content, 2);

                // [0]返信ユーザー
                // [1]返信内容情報
                $user_resmessage = explode(' ',$res_content[0], 2);

                $content->rescontent = $user_resmessage[0].'　'.$user_resmessage[1];
                $content->content = $res_content[1];
            }
        }

        return view('fishing.chat', compact('display_info','contents'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = bulletin_board::find($id);

        $response->isDeleted = TRUE;

        $response->save();

        return redirect('fishing/index');
    }


    public function content_update(Request $request, $id)
    {
        if(!empty($request->content)) {
            $bulletin_board_contents = new bulletin_board_contents();

            $bulletin_board_contents->user_id = Auth::id();
            $bulletin_board_contents->parentid = $id;

            if(!empty($request->resmessage)) {
                $message = $request->resmessage . ',' . $request->content;
                $message = nl2br($message);
                $bulletin_board_contents->content = $message;
                $bulletin_board_contents->responseid = $request->resid;
            }
            else {
                $bulletin_board_contents->content = $request->content;
                $bulletin_board_contents->responseid = 0;
            }

            $bulletin_board_contents->isDeleted = False;

            $bulletin_board_contents->save();
        }

        return redirect('fishing/show/'.$id);

    }
}
