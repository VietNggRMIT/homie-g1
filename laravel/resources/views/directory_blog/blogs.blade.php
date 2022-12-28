@extends('layouts.app')
@section('title', 'Blog listing')
@section('content')

    <div class="hero-top">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col" id="first-box">
                    <h1><b>Discover what other people are doing!</b></h1>
                    <p><br>
                    Old-bie and local love to share their experience.<br>
                    Discover what they share and broaden your knowledge<br>
                    through these blog posts.<br><br>              
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="blogs-wrapper my-5">
            <div class="breadcrumb justify-content-center">
                <h2>{{ Breadcrumbs::render('breadcrumb_blogs') }}</h2>
            </div>
            <div>Showing {{ $blogs->firstItem() }} - {{ $blogs->lastItem() }} blogs from the total of {{ $blogs->total() }} blogs.</div>
        <div class="container">
            <div class="blog-listing-section">
                @foreach ($blogs as $blog)
                    <div class="card blog-card gy-3 px-3 py-2 mb-1 smooth-transition">
                        <div class="row align-items-center">

                            <div class="col-md-8">
                                <div class="row">
                                    <a class="card-title h5 mb-3 smooth-transition" href="{{ route('blogs.show', ['blog' => $blog]) }}">
                                        {{ $blog->blog_name }}
                                    </a>
                                </div>
                                <div class="row">
                                    <p>
                                        <i class="fa-solid fa-calendar-days"></i>
                                        {{ $blog->created_at }}
                                        <i class="fa-solid fa-hashtag"></i>
                                        {{ $blog->id }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <p>
                                        <i class="fa-regular fa-id-card"></i>
                                        <a class="user-name smooth-transition" href="{{ route('users.show', ['user' => $blog->user]) }}">{{ $blog->user->user_real_name }}</a>
                                        <i class="fa-solid fa-hashtag"></i>
                                        {{ $blog->user->id }}
                                    </p>
                                </div>
                                <div class="row">
                                    <p><b>Updated at:</b> {{ $blog->updated_at }}</p>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                @endforeach
            </div>
            <div class="pagination">
                {{-- below is the box containing links to different page. get it to center? --}}
                <br><div>{{ $blogs->links() }}</div>
            </div>

        </div>
    </div>

@endsection
