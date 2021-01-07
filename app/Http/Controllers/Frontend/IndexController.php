<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Operations\PostOperation;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $posts = PostOperation::fetchAll();
        return view('frontend.index', compact('posts'));
    }
}
