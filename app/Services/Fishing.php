<?php

namespace App\Services;

use App\Models\tag;

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
}
