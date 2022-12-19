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

        <!-- <div>
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
        </div> -->
        
</body>
<footer>
<?php
        require($_SERVER['DOCUMENT_ROOT'].'/storage/template/footer.blade.php');
    ?>  
</footer>
</html>
