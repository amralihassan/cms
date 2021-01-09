<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Carbon\Carbon;
use Nicolaslopezj\Searchable\SearchableTrait;

class Post extends Model
{
    use Sluggable, SearchableTrait;

    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function media()
    {
        return $this->hasMany(PostMedia::class);
    }

    public function scopePost($q)
    {
        return $q->wherePostType('post');
    }

    public function scopeActive($q)
    {
        return $q->whereStatus(1);
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('M d Y');
    }

    public function approvedComments()
    {
        return $this->hasMany(Comment::class)->whereStatus(1)->orderBy('created_at', 'desc');
    }

    protected $searchable = [
        'columns' => [
            'posts.title' => 10,
            'posts.description' => 10
        ]
    ];
}
