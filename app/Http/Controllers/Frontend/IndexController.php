<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Operations\PostOperation;
use App\Models\Operations\CommentOperation;
use App\Models\Operations\CategoryOperation;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $posts = PostOperation::fetchAll();
        $categories = $this->categories();
        return view('frontend.index', compact('posts', 'categories'));
    }

    public function show(Post $post)
    {
        $categories = $this->categories();
        return view('frontend.show', compact('post',  'categories'));
    }

    public function storeComment(CommentRequest $request)
    {
        CommentOperation::store($request);
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $keywords = isset($request->keywords) && $request->keywords != '' ? $request->keywords : null;
        $categories = $this->categories();
        $posts = PostOperation::searchable($keywords);
        return view('frontend.index', compact('posts', 'categories'));
    }

    private function categories()
    {
        return CategoryOperation::fetchAll();
    }
}
