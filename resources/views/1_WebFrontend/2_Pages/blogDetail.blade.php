@extends('1_WebFrontend.1_Layouts.main')
@section('content')
    <!-- header -->
    <header class="w3l-header">
        <!--/nav-->
        <nav class="navbar navbar-expand-lg navbar-light fill px-lg-0 py-0 px-3">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <span class="fa fa-pencil-square-o"></span>Blogs</a>
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="fa icon-expand fa-bars"></span>
                    <span class="fa icon-close fa-times"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
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
    <div class="py-5 w3l-homeblock1 text-center">
        <div class="container mt-md-3">
            <h3 class="blog-desc-big text-center mb-4">{{ $blog->name }}</h3>
            <div class="blog-post-align">
                <div class="blog-post-img">
                    <a href=""><img src="{{ asset('/storage/' . $blog->image) }}" alt=""
                            class="rounded-circle img-fluid"></a>
                </div>
                <div class="blog-post-info">
                    <div class="author align-items-center mb-1">
                        <a href="">{{ $blog->author }}</a>
                    </div>
                    <ul class="blog-meta">
                        <li class="meta-item blog-lesson">
                            <span class="meta-value"> {{ \Carbon\Carbon::parse($blog->date)->format('j F, Y') }} </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="display-ad" style="margin: 8px auto; display: block; text-align:center;">
        <!---728x90--->
    </div>
    <section class="blog-post-main w3l-homeblock1">
        <!--/blog-post-->
        <div class="blog-content-inf pb-5">
            <div class="container pb-lg-4">
                <div class="single-post-image">
                    <div class="post-content">
                        <img src="{{ asset('/storage/' . $blog->image) }}" class="radius-image img-fluid mb-5"
                            alt="">
                    </div>
                </div>
                <div class="single-post-content">
                    <p class="mb-4">{{ $blog->content }} </p>

                    <div class="comments mt-5">
                        <h4 class="side-title ">Comments (2)</h4>
                        @foreach ($comments as $comment)
                            <div class="media">
                                <div class="media-body">
                                    <ul class="time-rply mb-2">
                                        <li>
                                            <a href="#URL" class="name mt-0 mb-2 d-block">{{ $comment->user->name }}</a>
                                            {{ \Carbon\Carbon::parse($comment->created_at)->format('j F, Y, g:i A') }}
                                        </li>
                                        <li class="reply-last">
                                            <a href="javascript:void(0)" class="reply"
                                                data-id="{{ $comment->id }}">Reply</a>
                                            @if (auth()->user()->id == $comment->user_id)
                                                <div class="btn-group">
                                                    <a href="" class="btn btn-warning btn-sm commentEdit"
                                                        data-id="{{ $comment->id }}"
                                                        data-comment="{{ $comment->comment }}">Edit</a>
                                                    <a href="" class="btn btn-danger btn-sm commentDelete"
                                                        data-id="{{ $comment->id }}">Delete</a>
                                                </div>
                                        </li>
                                    </ul>
                                    <p>{{ $comment->comment }}</p>
                        @endif

                        @if (isset($comment->sub_comments) && count($comment->sub_comments) > 0)
                            @foreach ($comment->sub_comments as $sub_comment)
                                <div class="media second mt-4 p-0 pt-2">
                                    <a class="img-circle img-circle-sm" href="#url">
                                        {{-- <img src="assets/images/c3.jpg" class="img-fluid" alt="..."> --}}
                                    </a>
                                    <div class="media-body">
                                        <ul class="time-rply mb-2">
                                            <li>
                                                <a href="#URL"
                                                    class="name mt-0 mb-2 d-block">{{ $sub_comment->user->name }}</a>
                                                {{ $sub_comment->created_at ? \Carbon\Carbon::parse($sub_comment->created_at)->format('j F, Y, g:i A') : 'Date not available' }}
                                            </li>
                                            <li class="reply-last">
                                                @if (auth()->user()->id == $sub_comment->user_id)
                                                    <div class="btn-group">
                                                        <a href="" class="btn btn-warning btn-sm subCommentEdit"
                                                            data-id="{{ $sub_comment->id }}"
                                                            data-comment="{{ $sub_comment->comment }}">Edit</a>
                                                        <a href="" class="btn btn-danger btn-sm subCommentDelete"
                                                            data-id="{{ $sub_comment->id }}">Delete</a>
                                                    </div>
                                                @endif
                                            </li>
                                        </ul>
                                        <p>{{ $sub_comment->comment }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        <div class="reply-form-container" id="reply-form-{{ $comment->id }}" style="display:none;">
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="leave-comment-form mt-5" id="reply">
                <h4 class="side-title mb-2">Leave a Reply</h4>
                <form id="AddComment" method="post" action="{{ route('BlogComment') }}">
                    <div class="form-group">
                        <textarea name="comment" class="form-control" placeholder="Your Comment*" required="" spellcheck="false"></textarea>
                    </div>
                    <input name="blog_id" value="{{ $blog->id }}" hidden />

                    <div class="submit text-right">
                        <button class="btn btn-style btn-primary">Post Comment </button>
                    </div>
                </form>
            </div>

        </div>
        </div>
        <!--//blog-post-->
        </div>
    </section>

@section('script')
    <script src="{{ asset('1_WebFrontend/assets/js/main.js') }}"></script>
@endsection
@endsection
