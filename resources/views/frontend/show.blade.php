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
                <div class="wn__sidebar">
                    <!-- Start Single Widget -->
                    <aside class="widget search_widget">
                        <h3 class="widget-title">Search</h3>
                        <form action="#">
                            <div class="form-input">
                                <input type="text" placeholder="Search...">
                                <button><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </aside>
                    <!-- End Single Widget -->
                    <!-- Start Single Widget -->
                    <aside class="widget recent_widget">
                        <h3 class="widget-title">Recent</h3>
                        <div class="recent-posts">
                            <ul>
                                <li>
                                    <div class="post-wrapper d-flex">
                                        <div class="thumb">
                                            <a href="blog-details.html"><img src="{{asset('frontend/images/blog/sm-img/1.jpg')}}" alt="blog images"></a>
                                        </div>
                                        <div class="content">
                                            <h4><a href="blog-details.html">Blog image post</a></h4>
                                            <p>	March 10, 2015</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="post-wrapper d-flex">
                                        <div class="thumb">
                                            <a href="blog-details.html"><img src="{{asset('frontend/images/blog/sm-img/2.jpg')}}" alt="blog images"></a>
                                        </div>
                                        <div class="content">
                                            <h4><a href="blog-details.html">Post with Gallery</a></h4>
                                            <p>	March 10, 2015</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="post-wrapper d-flex">
                                        <div class="thumb">
                                            <a href="blog-details.html"><img src="{{asset('frontend/images/blog/sm-img/3.jpg')}}" alt="blog images"></a>
                                        </div>
                                        <div class="content">
                                            <h4><a href="blog-details.html">Post with Video</a></h4>
                                            <p>	March 10, 2015</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="post-wrapper d-flex">
                                        <div class="thumb">
                                            <a href="blog-details.html"><img src="{{asset('frontend/images/blog/sm-img/4.jpg')}}" alt="blog images"></a>
                                        </div>
                                        <div class="content">
                                            <h4><a href="blog-details.html">Maecenas ultricies</a></h4>
                                            <p>	March 10, 2015</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="post-wrapper d-flex">
                                        <div class="thumb">
                                            <a href="blog-details.html"><img src="{{asset('frontend/images/blog/sm-img/5.jpg')}}" alt="blog images"></a>
                                        </div>
                                        <div class="content">
                                            <h4><a href="blog-details.html">Blog image post</a></h4>
                                            <p>	March 10, 2015</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </aside>
                    <!-- End Single Widget -->
                    <!-- Start Single Widget -->
                    <aside class="widget comment_widget">
                        <h3 class="widget-title">Comments</h3>
                        <ul>
                            @forelse ($post->comments->take(5) as $comment)
                                <li>
                                    <div class="post-wrapper">
                                        <div class="thumb">
                                            <img src="{{asset('frontend/images/blog/comment/1.jpeg')}}" alt="Comment images">
                                        </div>
                                        <div class="content">
                                            <p>{{$comment->name}}:</p>
                                            <a href="#">{{Str::limit($comment->comment,20,'...')}}</a>
                                        </div>
                                    </div>
                                </li>

                            @empty

                            @endforelse

                        </ul>
                    </aside>
                    <!-- End Single Widget -->
                    <!-- Start Single Widget -->
                    <aside class="widget category_widget">
                        <h3 class="widget-title">Categories</h3>
                        <ul>
                            @forelse ($categories as $category)
                                <li><a href="#">{{$category->name}}</a></li>
                            @empty
                                <p>No categories added</p>
                            @endforelse

                        </ul>
                    </aside>
                    <!-- End Single Widget -->
                    <!-- Start Single Widget -->
                    <aside class="widget archives_widget">
                        <h3 class="widget-title">Archives</h3>
                        <ul>
                            <li><a href="#">March 2015</a></li>
                            <li><a href="#">December 2014</a></li>
                            <li><a href="#">November 2014</a></li>
                            <li><a href="#">September 2014</a></li>
                            <li><a href="#">August 2014</a></li>
                        </ul>
                    </aside>
                    <!-- End Single Widget -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
