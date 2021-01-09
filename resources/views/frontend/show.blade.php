@extends('layouts.app')
@section('content')
<div class="page-blog-details section-padding--lg bg--white">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-12">
                <div class="blog-details content">
                    <article class="blog-post-details">
                        <div class="post-thumbnail">
                            @if ($post->media->count() > 0)
                                @include('frontend._carsoul')
                            @else
                                <img src="{{asset('assets/posts/default.jpg')}}" alt="{{$post->title}}">
                            @endif
                        </div>
                        <div class="post_wrapper">
                            <div class="post_header">
                                <h2>{{$post->title}}</h2>
                                <div class="blog-date-categori">
                                    <ul>
                                        <li>{{$post->created_at}}</li>
                                        <li><a href="#" title="Posts by" rel="author">{{$post->user->name}}</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="post_content">
                             <p>{!!$post->description!!}</p>
                            </div>
                            <ul class="blog_meta">
                                <li><a href="#">{{$post->approvedComments->count()}} comments</a></li>
                                <li> / </li>
                                <li>Category: <span>{{$post->category->name}}</span>
                                </li>
                            </ul>
                        </div>
                    </article>
                    <div class="comments_area">
                        <h3 class="comment__title">{{$post->approvedComments->count()}} comment</h3>
                        <ul class="comment__list">
                            @foreach ($post->approvedComments as $comment)
                                <li>
                                    <div class="wn__comment">
                                        <div class="thumb">
                                            <img src="{{get_gravatar($comment->email,46)}}" alt="comment images">
                                        </div>
                                        <div class="content">
                                            <div class="comnt__author d-block d-sm-flex">
                                                <span><a href="{{$comment->url == '' ? '#':$comment->url}}"><strong>{{$comment->name}}</strong></a> </span>
                                                <span>{{$comment->created_at}}</span>
                                            </div>
                                            <p>{{$comment->comment}}</p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    @include('frontend._add-comment')
                </div>
            </div>
            <div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
                @include('partial.frontend.sidebar',['categories'=>$categories])
            </div>
        </div>
    </div>
</div>
@endsection
