@extends('frontend.layouts.app')
@section('content')
<div role="main" class="main">

  <section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
    <div class="container">
      <div class="row">

        <div class="col-md-12 align-self-center p-static order-2 text-center">


          <h1 class="text-dark font-weight-bold text-8">FAS TEST CODE</h1>
          <span class="sub-title text-dark">Check out our Latest Posts!</span>
        </div>

        <div class="col-md-12 align-self-center order-1">


          <ul class="breadcrumb d-block text-center">
            <li class="active">Post</li>
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
                href="{{ route('frontend.blog.category',$category->slug) }}">{{ $category->name }}
                ({{ $category->posts_count }})</a></li>
            @endforeach
          </ul>
          <div class="tabs tabs-dark mb-4 pb-2">
            <ul class="nav nav-tabs">
              <li class="nav-item"><a class="nav-link text-1 font-weight-bold text-uppercase" href="#recentPosts"
                  data-toggle="tab">Recent</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="recentPosts">
                <ul class="simple-post-list">
                  @foreach ($posts_recent as $post)
                  <li>
                    <div class="post-image">
                      <div class="img-thumbnail img-thumbnail-no-borders d-block">
                        <a href="{{ route('frontend.blog.detail',$post->slug) }}">
                          <img src="{{ asset($post->thumbnail) }}" width="50" height="50" alt="">
                        </a>
                      </div>
                    </div>
                    <div class="post-info">
                      <a href="{{ route('frontend.blog.detail',$post->slug) }}">{{ $post->title }}</a>
                      <div class="post-meta">
                        {{ Carbon\Carbon::parse($post->created_at)->format('D, M, Y') }}
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
        <div class="blog-posts">
          @foreach ($posts as $post)
          <article class="post post-large">
            <div class="post-image">
              <a href="{{ route('frontend.blog.detail',$post->slug) }}">
                <img src="{{ asset($post->image) }}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0"
                  alt="" />
              </a>
            </div>

            <div class="post-date">
              <span class="day">{{ Carbon\Carbon::parse($post->created_at)->format('d') }}</span>
              <span class="month">{{ Carbon\Carbon::parse($post->created_at)->format('M') }}</span>
            </div>

            <div class="post-content">

              <h2 class="font-weight-semibold text-6 line-height-3 mb-3"><a
                  href="{{ route('frontend.blog.detail',$post->slug) }}">{{$post->title}}</a></h2>
              <p>{{$post->short_description}}</p>

              <div class="post-meta">
                <span><i class="far fa-folder"></i> <a
                    href="{{ route('frontend.blog.category',$post->category->slug) }}">{{ $post->category->name }}</a></span>
                <span class="d-block d-sm-inline-block float-sm-right mt-3 mt-sm-0"><a
                    href="{{ route('frontend.blog.detail',$post->slug) }}"
                    class="btn btn-xs btn-light text-1 text-uppercase">Read More</a></span>
              </div>

            </div>
          </article>
          @endforeach

          {{ $posts->links() }}
        </div>
      </div>
    </div>

  </div>

</div>
@endsection