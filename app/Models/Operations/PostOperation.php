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

    public static function searchable($keywords)
    {
        $posts = Post::with('category', 'user', 'media')
            ->post()->active()->orderBy('id', 'desc')
            ->whereHas('category', function ($q) {
                $q->whereStatus(1);
            })
            ->whereHas('user', function ($q) {
                $q->whereStatus(1);
            });

        if (!empty($keywords)) {
            $posts->search($keywords, null, true);
        }
        return $posts->paginate(5);
    }
}
