@extends('layouts.app')
@section('title', 'Blogs')
@section('content')
@livewireStyles
    <div class="hero-top">
        <div class="container-fluid">

            @if(session('blog_success_destroy'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <span>Deleted blog from the database!</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

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
        @livewire('blog-results')

        @livewireScripts
    </div>

@endsection
