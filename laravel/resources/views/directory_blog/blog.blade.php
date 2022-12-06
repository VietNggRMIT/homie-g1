<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body>
    <div>
        <div>
            <button
                onclick="window.location.href='{{ route('route_home') }}';"
                type="button"
            >
                Home
            </button>
            <button
                onclick="window.location.href='{{ route('listings.index') }}';"
                type="button"
            >
                Show all listings
            </button>
            <button
                onclick="window.location.href='{{ route('blogs.index') }}'"
                type="button"
            >
                Show all blogs
            </button>
            <button
                onclick="window.location.href='{{ route('route_about') }}'"
                type="button"
            >
                About
            </button>
            <button
                onclick="window.location.href='{{ url()->previous() }}';"
                type="button"
            >
                Back to previous page
            </button>
            {{ Breadcrumbs::render('breadcrumb_blog', $custom_blog) }}
        </div>

        <hr>

        <div>
            <div>$custom_blog->id: {{ $custom_blog->id }}</div>
            <div>
                $custom_blog->blog_name:
                <button
                    onclick="window.location.href='{{ route('blogs.show', ['blog' => $custom_blog]) }}';"
                    type="button"
                >
                    {{ $custom_blog->blog_name }}
                </button>
            </div>
            <div>$custom_blog->blog_description: {!!  nl2br(e($custom_blog->blog_description)) !!}</div>
            <div>$custom_blog->user_id: {{ $custom_blog->user_id }}</div>
            <div>$custom_blog->created_at: {{ $custom_blog->created_at }}</div>
            <div>$custom_blog->updated_at: {{ $custom_blog->updated_at }}</div>
        </div>
        <fieldset>
            <legend>Posted by:</legend>
            <div>$custom_blog->user->id:' {{ $custom_blog->user->id }}</div>
            <div>
                $custom_blog->user->user_real_name:
                <button
                    onclick="window.location.href='{{ route('users.show', ['user' => $custom_blog->user]) }}';"
                    type="button"
                >
                    {{ $custom_blog->user->user_real_name }}
                </button>
            </div>
        </fieldset>
    </div>

    @vite('resources/js/app.js')
    @vite('webfonts.css')
</body>
</html>
