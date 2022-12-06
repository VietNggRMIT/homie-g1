<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'webfonts.css'])
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
            {{ Breadcrumbs::render('breadcrumb_blogs') }}
        </div>

        <hr>

        <h1>Blogs</h1>

        <hr>

        @foreach($blogs as $blog)
            <div>
                <h2>Blog</h2>
                <div>$blog->id: {{ $blog->id }}</div>
                <div>
                    $blog->blog_name:
                    <button
                        onclick="window.location.href='{{ route('blogs.show', ['blog' => $blog]) }}';"
                        type="button"
                    >
                        {{ $blog->blog_name }}
                    </button>
                </div>
                <div>$blog->blog_description: {!!  nl2br(e($blog->blog_description)) !!}</div>
                <div>$blog->user_id: {{ $blog->user_id }}</div>
                <div>$blog->created_at: {{ $blog->created_at }}</div>
                <div>$blog->updated_at: {{ $blog->updated_at }}</div>
            </div>

            <div>
                <h2>Posted by</h2>
                <div>$blog->user->id: {{ $blog->user->id }}</div>
                <div>
                    $blog->user->user_real_name:
                    <button
                        onclick="window.location.href='{{ route('users.show', ['user' => $blog->user]) }}';"
                        type="button"
                    >
                        {{ $blog->user->user_real_name }}
                    </button>
                </div>
            </div>
            <hr>
        @endforeach
    </div>
</body>
</html>
