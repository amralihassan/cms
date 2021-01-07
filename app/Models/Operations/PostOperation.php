<?php

namespace App\Models\Operations;

use App\Models\Post;

class PostOperation extends Post
{
    public static function fetchAll()
    {
        return Post::with('category', 'user', 'media')
            ->post()->active()->orderBy('id', 'desc')
            ->whereHas('category', function ($q) {
                $q->whereStatus(1);
            })
            ->whereHas('user', function ($q) {
                $q->whereStatus(1);
            })
            ->paginate(5);
    }
}
