@extends('1_WebFrontend.1_Layouts.main')
@section('content')
    <!-- header -->
    <header class="w3l-header">
        <!--/nav-->
        <nav class="navbar navbar-expand-lg navbar-light fill px-lg-0 py-0 px-3">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <span class="fa fa-pencil-square-o"></span>Blogs</a>
                <!-- if logo is image enable this
      <a class="navbar-brand" href="#index.html">
       <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
      </a> -->
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <!-- <span class="navbar-toggler-icon"></span> -->
                    <span class="fa icon-expand fa-bars"></span>
                    <span class="fa icon-close fa-times"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">

                    </ul>
                </div>

                <!-- toggle switch for light and dark theme -->
                <div class="mobile-position">
                    <nav class="navigation">
                        <div class="theme-switch-wrapper">
                            <label class="theme-switch" for="checkbox">
                                <input type="checkbox" id="checkbox">
                                <div class="mode-container">
                                    <i class="gg-sun"></i>
                                    <i class="gg-moon"></i>
                                </div>
                            </label>
                        </div>
                    </nav>
                </div>
                <!-- //toggle switch for light and dark theme -->
            </div>
        </nav>
        <!--//nav-->
    </header>
    <!-- //header -->
    <div class="w3l-searchblock w3l-homeblock1 py-5">
        <div class="container py-lg-4 py-md-3">
            <!-- block -->
            <div class="row">
                <div class="col-lg-12 most-recent">
                    <div class="row">
                        @foreach ($blogs as $blog)
                            <div class="col-lg-6 col-md-6 item mt-5 pt-lg-3">
                                <div class="card">
                                    <div class="card-header p-0 position-relative">
                                        <a href="{{ route('BlogInfo',$blog->id)}}">
                                            <img class="card-img-bottom d-block radius-image"
                                                src="{{ asset('/storage/' . $blog->image) }}" alt="Card image cap" style="width: 300px; height: 200px; object-fit: cover;">
                                        </a>
                                    </div>
                                    <div class="card-body p-0 blog-details">
                                        <a href="{{ route('BlogInfo',$blog->id)}}" class="blog-desc">{{ $blog->name }}
                                        </a>
                                        <p>{{ $blog->content }}</p>
                                        <div class="author align-items-center mt-3 mb-1">
                                            <a href="{{ route('BlogInfo',$blog->id)}}">{{ $blog->author }}</a>
                                        </div>
                                        <ul class="blog-meta">
                                            <li class="meta-item blog-lesson">
                                                <span class="meta-value">
                                                    {{ \Carbon\Carbon::parse($blog->date)->format('j F, Y') }} </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection