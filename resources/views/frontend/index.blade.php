@extends('layouts.app')
@section('content')
        <!-- End Bradcaump area -->
        <!-- Start Blog Area -->
        <div class="page-blog bg--white section-padding--lg blog-sidebar right-sidebar">
        	<div class="container">
        		<div class="row">
        			<div class="col-lg-9 col-12">
        				<div class="blog-page">
                                @forelse ($posts as $post)
                                    <!-- Start Single Post -->
                                    <article class="blog__post d-flex flex-wrap">
                                        <div class="thumb">
                                            <a href="{{route('frontend.post.show',['activePost'=>$post])}}">
                                                @if ($post->media->count() > 0)
                                                    <img src="{{asset('assets/posts/'.$post->media->first()->filename)}}" alt="{{$post->title}}">
                                                @else
                                                    <img src="{{asset('assets/posts/default.jpg')}}" alt="{{$post->title}}">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h4><a href="{{route('frontend.post.show',['activePost'=>$post])}}">{{$post->title}}</a></h4>
                                            <ul class="post__meta">
                                                <li>Posts by : <a href="#">{{$post->user->name}}</a></li>
                                                <li class="post_separator">/</li>
                                                <li>{{$post->created_at}}</li>
                                            </ul>
                                            <p>{!!Str::limit($post->description, 145, '...')!!}</p>
                                            <div class="blog__btn">
                                                <a href="{{route('frontend.post.show',['activePost'=>$post])}}">read more</a>
                                            </div>
                                        </div>
                                    </article>
                                    <!-- End Single Post -->
                                @empty
                                    <div class="text-center">
                                        No posts found
                                    </div>
                                @endforelse

        					<!-- End Single Post -->
                        </div>
                        {{$posts->links()}}
        			</div>
        			<div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
                        @include('partial.frontend.sidebar',['categories'=>$categories])
        			</div>
        		</div>
        	</div>
        </div>
        <!-- End Blog Area -->
@endsection
