@extends('layouts.app')
@section('title', 'Blog post')
@section('content')

<div class="container blogpost">
    <div class="row">
        <div class="col-lg-12">
            <article>
                <header class="mb-4">
                <button
                    onclick="window.location.href='{{ route('blogs.edit', ['blog' => $blog]) }}';"
                    type="button"
                >
                    Edit this blog
                </button>
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

@endsection
