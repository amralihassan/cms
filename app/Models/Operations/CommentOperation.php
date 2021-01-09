<?php

namespace App\Models\Operations;

use App\Models\Comment;


class CommentOperation extends Comment
{
    public static function store($request)
    {
        return Comment::create($request->all() +
            [
                'status' => 1,
                'ip_address' => $request->ip()
            ]);
    }
}
