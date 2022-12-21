@extends('layouts.app')
@section('title', 'Privacy')
@section('content')
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>
    <div class="container">
        <div>
            <button
                onclick="window.location.href='{{ route('route_home') }}';"
                type="button"
                class="btn btn-primary"
            >
                Home
            </button>
            <button
                onclick="window.location.href='{{ route('listings.index') }}';"
                type="button"
                class="btn btn-primary"
            >
                Listings
            </button>
            <button
                onclick="window.location.href='{{ route('blogs.index') }}'"
                type="button"
                class="btn btn-primary"
            >
                Blogs
            </button>
            <button
                onclick="window.location.href='{{ route('route_about') }}'"
                type="button"
                class="btn btn-primary"
            >
                About
            </button>
            <button
                onclick="window.location.href='{{ url()->previous() }}';"
                type="button"
                class="btn btn-primary"
            >
                Back to previous page
            </button>
        </div>
    </div>
        <div class="main-wrapper">
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
        <div class="blogs-wrapper">
            <div class="breadcrumb justify-content-center">
                <h2>{{ Breadcrumbs::render('breadcrumb_blogs') }}</h2>
            </div>
            @foreach($blogs as $blog)
            <div class="blog-container align-item-center">
                        <div class="card border" style="width: 100%;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h5 class="card-title"><b><button onclick="window.location.href='{{ route('blogs.show', ['blog' => $blog]) }}';"
                                                    type="button"><b>{{ $blog->blog_name }}</button></b></b></h5>
                                        <p><i class="fa-solid fa-calendar-days"></i> {{ $blog->created_at }}  <i class="fa-solid fa-hashtag"></i>{{ $blog->id }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="blog-info">
                                            <p><i class="fa-regular fa-id-card"></i><button class="user-name"
                                                onclick="window.location.href='{{ route('users.show', ['user' => $blog->user]) }}';"
                                                type="button"
                                            >
                                                {{ $blog->user->user_real_name }}
                                            </button> <i class="fa-solid fa-hashtag"></i>{{ $blog->user->id }}</p>
                                            <p><b>Updated at:</b> {{ $blog->updated_at }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
@endsection
