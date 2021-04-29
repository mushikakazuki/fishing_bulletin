<?php

namespace App\Services;

use App\Models\tag;
use Illuminate\Support\Facades\DB;

class Fishing {
    public static function tag_name($id) {
        $res = tag::find($id);

        return $res->tag_name;
    }

    // tagのIDを返却する
    public static function tag_name_change_id($tag) {
        $res = tag::where('tag_name', $tag)->first();

        return $res->id;
    }

    // imgセット
    public static function img_set($tag) {
        if ($tag === 1) {
            return "img/fishing_results.jpg";
        }
        if ($tag === 2) {
            return "/img/fishing_friend.jpg";
        }
        if ($tag === 3) {
            return "/img/chat_image.jpg";
        }
        if ($tag === 4) {
            return "/img/question.jpg";
        }
        if ($tag === 5) {
            return "/img/other.jpg";
        }
    }

    // カードの初回投稿内容の取得
    public static function card_display($parentid) {
        $content = DB::table('bulletin_board_contents')->select('content')->where('parentid', $parentid)->first();
        return $content;
    }
}
