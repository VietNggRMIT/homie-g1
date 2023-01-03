@extends('layouts.app')
@section('title', 'Blog post')
@section('content')

<div class="container">
    <div class="breadcrumb justify-content-center mt-5">
        <h2>{{ Breadcrumbs::render('breadcrumb_blog', $blog) }}</h2>
    </div>

    <div class="blogpost">
        <div class="row">
            <div class="col-lg-12">
                <article>
                    <header class="mb-4">

                        <div class="header-content">
                        
                            <h1 class="fw-bolder mb-1 mt-3">{{ $blog->blog_name }}</h1>
                            <p class="mb-1">Blog ID: <i class="fa-solid fa-hashtag purple-ice"></i> {{ $blog->id }}</p>
                            <span class="h6">
                                by <a class="author smooth-transition" href="{{ route('users.show', ['user' => $blog->user]) }}">{{ $blog->user->user_real_name }}</a>
                                <i class="fa-solid fa-hashtag purple-ice"></i> {{ $blog->user_id }}
                            </span>
                            <div class="text-muted fst-italic my-2">
                                Posted on {{ $blog->created_at }}
                                <br> 
                                Updated at {{ $blog->updated_at }}
                            </div>

                        </div>

                    </header>
                    <section class="mb-3">
                        <p class="fs-5 mb-4"> {!!  nl2br(e($blog->blog_description)) !!} </p>
                    </section>
                </article>
                @if(session('user'))
                    @if (session('user')->id == $blog->user->id)
                        <div class="blog-modifications d-flex justify-content-end mb-3">
                            <a class="btn btn-outline-primary" href="{{ route('blogs.edit', ['blog' => $blog]) }}">Edit this blog</a>
                            <form method="POST" action="{{ url("delete-blog/{$blog->id}") }}">
                                @csrf
                                <button class="btn btn-outline-danger ms-3" type="submit">Delete this blog</button>
                            </form>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>

</div>  

@endsection
