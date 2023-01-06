@extends('layouts.app')
@section('title', 'Blog'.' '.$blog->blog_name)
@section('content')

<div class="container">

    @if(session('blog_success_store'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span>Saved blog <b>{{ $blog->blog_name }}</b> to the database!</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif(session('blog_success_update'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span>Updated blog <b>{{ $blog->blog_name }}</b> to the database!</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


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
                            <p class="mb-1">Blog ID <i class="fa-solid fa-hashtag purple-ice"></i> {{ $blog->id }}</p>
                            <span class="h6">
                                by <a class="author smooth-transition" href="{{ route('users.show', ['user' => $blog->user]) }}">{{ $blog->user->user_real_name }}</a>
                                <i class="fa-solid fa-hashtag purple-ice"></i> {{ $blog->user_id }}
                            </span>
                            <div class="text-muted fst-italic my-2">
                                <span class="text-secondary text-opacity-25" data-toggle="tooltip" data-placement="top" title="{{ $blog->created_at }}">
                                    Posted at {{ $blog->created_at->diffForHumans(['parts' => 3, 'join' => ', ', 'short' => false]) }}
                                </span>
                                <br>
                                <span class="text-secondary text-opacity-25" data-toggle="tooltip" data-placement="top" title="{{ $blog->updated_at }}">
                                    Updated at {{ $blog->updated_at->diffForHumans(['parts' => 3, 'join' => ', ', 'short' => false]) }}
                                </span>
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
                            <a class="btn btn-outline-secondary" href="{{ route('blogs.edit', ['blog' => $blog]) }}">Edit</a>
                            <form method="POST" action="{{ url("delete-blog/{$blog->id}") }}" name="deleteBlogForm">
                                @csrf
                                <button class="btn btn-outline-danger ms-3" type="submit" onClick="envio(event)">Delete</button>
                            </form>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>

</div>

@endsection

<script>
    function envio(event) {
        event.preventDefault();
        var r=confirm("Do you want to delete {{ $blog->blog_name }}?");
        if (r==true) {
            // window.location="edicao-demandas-result.lbsp";
            deleteBlogForm.submit();
        }
    }
</script>
