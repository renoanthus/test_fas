@extends('cms.layouts.app')
@section('title')
Dashboard
@endsection
@section('content')
<h4 style="font-family: Roboto">Overview</h4>
<div class="row">
    <div class="col-xl-6 col-md-6">
        <div class="card-box">
            <h4 class="header-title mt-0 mb-3">Total Categories</h4>

            <div class="widget-box-2">
                <div class="widget-detail-2 text-right">
                    <h2 class="font-weight-normal mb-1"> {{ $category_count }} </h2>
                    <p class="text-muted mb-3">Categories</p>
                </div>
            </div>
        </div>

    </div><!-- end col -->


    <div class="col-xl-6 col-md-6">
        <div class="card-box">

            <h4 class="header-title mt-0 mb-3">Total Posts</h4>

            <div class="widget-box-2">
                <div class="widget-detail-2 text-right">
                    <h2 class="font-weight-normal mb-1"> {{ $post_count }} </h2>
                    <p class="text-muted mb-3">Posts</p>
                </div>
            </div>
        </div>

    </div><!-- end col -->

</div>
<!-- end row -->
@endsection