@extends('layouts.app')
@section('title', 'Privacy')
@section('content')
<body>
    <div class="container blog">
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
        <div class="container blogpost">
            <div class="row">
                <div class="col-lg-12">
                    <article>
                        <header class="mb-4">
                        <div class="breadcrumb justify-content-center">
                            <h2>{{ Breadcrumbs::render('breadcrumb_blog', $blog) }}</h2>
                        </div>
                            <h1 class="fw-bolder mb-1">{{ $blog->blog_name }}</h1>
                            <p>Blog ID: {{ $blog->id }}</p>
                            <div class="text-muted fst-italic mb-2">Posted on {{ $blog->created_at }} by 
                            <button onclick="window.location.href='{{ route('users.show', ['user' => $blog->user]) }}';" type="button">
                            {{ $blog->user->user_real_name }} 
                            </button>
                            with ID: {{ $blog->user_id }}<br>
                            Updated at {{ $blog->updated_at }}</div>
                        </header>
                        <section class="mb-5">
                            <p class="fs-5 mb-4"> {!!  nl2br(e($blog->blog_description)) !!} </p>
                        </section>
                    </article>
                </div>
            </div>
        </div>        
</body>
</html>
@endsection
