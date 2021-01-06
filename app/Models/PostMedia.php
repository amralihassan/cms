<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostMedia extends Model
{
    protected  $guarded = [];

    public function posts()
    {
        return $this->belongsTo(Post::class);
    }
}
