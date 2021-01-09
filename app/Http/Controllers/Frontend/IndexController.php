<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Operations\PostOperation;
use App\Models\Operations\CommentOperation;
use App\Models\Operations\CategoryOperation;

class IndexController extends Controller
{
    public function index()
    {
        $posts = PostOperation::fetchAll();
        return view('frontend.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $categories = CategoryOperation::fetchAll();
        return view('frontend.show', compact('post', 'categories'));
    }

    public function storeComment(CommentRequest $request)
    {
        CommentOperation::store($request);
        return redirect()->back();
    }
}
