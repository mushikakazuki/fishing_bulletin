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
}
