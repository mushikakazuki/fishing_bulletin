<?php

namespace App\Http\Controllers;

use App\Models\bulletin_board;
use App\Models\bulletin_board_contents;
use Illuminate\Http\Request;



use Illuminate\Support\Facades\DB;
use App\Services\Fishing;

class FishingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tag_name = '';

        // dd($request->tag);
        if(!empty($request->tag)) {
            $data_all = DB::table('bulletin_boards')->orderBy('updated_at', 'desc')->where('tag_id',$request->tag)->paginate(4);;

            $tag_name = Fishing::tag_name($request->tag);
        }
        else {
            $data_all = DB::table('bulletin_boards')->orderBy('updated_at', 'desc')->paginate(4);
        }

        // タグ名変更（本来はオブジェクトの中に入れたほうが後々楽になるよ）
        foreach($data_all as $data) {
            $data->tag_id = Fishing::tag_name($data->tag_id);
        }

        return view('fishing.boardlist', compact('data_all','tag_name'));
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
        // 入力チェック
        $validatedData = $request->validate([
            'title' => 'required|max:50',
            'tag' => 'required',
            'content' => 'required|max:500'
        ]);

        $bulletin_board = new bulletin_board();

        $bulletin_board->user_id = 1;
        $bulletin_board->title = $request->title;
        $bulletin_board->tag_id = $request->tag;

        $bulletin_board->save();

        // この取得方法だと、同時に追加時ずれる可能性あり
        $id = bulletin_board::max('id');

        $bulletin_board_contents = new bulletin_board_contents();
        $bulletin_board_contents->parentid = intval($id);
        $bulletin_board_contents->content = $request->content;
        $bulletin_board_contents->user_id = 1;
        $bulletin_board_contents->responseid = 0;

        $bulletin_board_contents->save();

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
        $display_info = DB::table('bulletin_boards')->where('id', $id)->first();

        $display_info->tag_name = Fishing::tag_name($display_info->tag_id);

        $contents = DB::table('bulletin_board_contents')->where('parent_id', $id)->get();

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
}
