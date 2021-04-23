@extends('frontend.layouts.app')
@section('content')
<div role="main" class="main">
    <section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb d-block text-center">
                        <li><a href="{{ route('frontend.index') }}">Home</a></li>
                        <li class="active">Blog</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-4">
        <div class="row">
            <div class="col-lg-3 order-lg-2">
                <aside class="sidebar">
                    <h5 class="font-weight-bold pt-4">Categories</h5>
                    <ul class="nav nav-list flex-column mb-5">
                        @foreach ($categories as $category)
                        <li class="nav-item"><a class="nav-link"
                                href="{{ route('frontend.blog.category',$category->slug) }}">{{ $category->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                    <div class="tabs tabs-dark mb-4 pb-2">
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a class="nav-link text-1 font-weight-bold text-uppercase"
                                    href="#recentPosts" data-toggle="tab">Recent</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="recentPosts">
                                <ul class="simple-post-list">
                                    @foreach ($posts_recent as $item)
                                    <li>
                                        <div class="post-image">
                                            <div class="img-thumbnail img-thumbnail-no-borders d-block">
                                                <a href="{{ route('frontend.blog.detail',$item->slug) }}">
                                                    <img src="{{ asset($item->thumbnail) }}" width="50" height="50"
                                                        alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="post-info">
                                            <a
                                                href="{{ route('frontend.blog.detail',$item->slug) }}">{{ $item->title }}</a>
                                            <div class="post-meta">
                                                {{ Carbon\Carbon::parse($item->created_at)->format('D, M, Y') }}
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
            <div class="col-lg-9 order-lg-1">
                <div class="blog-posts single-post">
                    <article class="post post-large blog-single-post border-0 m-0 p-0">
                        <div class="post-image ml-0">
                            <a href="{{ route('frontend.blog.detail',$post->slug) }}">
                                <img src="{{ asset($post->image) }}"
                                    class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" />
                            </a>
                        </div>

                        <div class="post-date ml-0">
                            <span class="day">{{ Carbon\Carbon::parse($post->created_at)->format('d') }}</span>
                            <span class="month">{{ Carbon\Carbon::parse($post->created_at)->format('M') }}</span>
                        </div>

                        <div class="post-content ml-0">

                            <h2 class="font-weight-bold"><a
                                    href="{{ route('frontend.blog.detail',$post->slug) }}">{{$post->title}}</a></h2>

                            <div class="post-meta">
                                <span><i class="far fa-folder"></i> <a
                                        href="{{ route('frontend.blog.category',$post->category->slug) }}">{{ $post->category->name }}</a>
                                </span>
                            </div>

                            {!! $post->content !!}

                        </div>
                    </article>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection