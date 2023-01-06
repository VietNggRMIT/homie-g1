@extends('layouts.app')
@section('title', 'Create/Edit Blog')
{{-- /*****************************************************************************
*Title: Database: Routing
*Author: Laravel
*Code version: 9.x
*Availability: https://laravel.com/docs/9.x/routing (Accessed 5 November 2022)
*****************************************************************************/ --}}
@if(isset($blog))
    <title>Edit Blog</title>
@else
    <title>Create Blog</title>
@endif

<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')

    <div class="container my-5">

        <div class="card edit-form p-3">
            <!-- <div class="card-header text-center font-weight-bold">Add or Edit Blog Post Form</div> -->
            <div class="card-body form-bg p-5">

                {{-- 0. Form Title --}}
                @if(isset($blog))
                    <div class="text-center"><h1>Update Blog</h1></div>
                @else
                    <div class="text-center"><h1>Create Blog</h1></div>
                @endif

                {{-- 0. Buttons --}}
                @if(isset($blog))
                    <button onclick="window.location.href='{{ route('blogs.show', ['blog' => $blog]) }}';" type="button" class="btn btn-danger mb-3">Cancel</button>
                @else
                    <button onclick="window.location.href='{{ route('users.show', ['user' => session('user')]) }}';" type="button" class="btn btn-danger mb-3">Cancel</button>
                @endif
                <button onclick="window.location.href='{{ route('blogs.index') }}';" type="button" class="btn btn-secondary mb-3">Back to all blogs</button>

                {{-- 0. Form Begins --}}
                <form name="add-blog-post-form" id="add-blog-post-form" method="post"
                    @if(isset($blog))
                        action="{{ url("update-blog/{$blog->id}") }}">
                    @else
                        action="{{ url('store-blog') }}">
                    @endif

                    {{-- 0. Form Inside --}}
                    @csrf

                    {{-- 0. User --}}
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <label for="user_real_name" class="input-group-text">You Are</label>
                            <input type="text" class="form-control" id="user_real_name" disabled value="{{ session('user')->user_real_name }}">
                        </div>
                    </div>

                    {{-- 1. Blog Name --}}
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="blog_name" id="blog_name" placeholder="Blog Name"
                        @if(isset($blog))
                            value="{{ $blog->blog_name }}">
                        @else
                            >
                        @endif
                        <label for="blog_name">Blog Name</label>
                    </div>

                    {{-- 2. Blog Description --}}
                    <div class="form-floating">
                        @if (isset($blog))
                            <textarea class="form-control" placeholder="Blog Description" id="blog_description" name="blog_description" style="height: 400px">{{ $blog->blog_description }}</textarea>
                        @else
                            <textarea class="form-control" placeholder="Blog Description" id="blog_description" name="blog_description" style="height: 400px"></textarea>
                        @endif
                        <label for="blog_description">Blog Description</label>
                    </div>

                    {{-- 3. (Hidden) --}}
                    <div class="form-group">

                        {{-- Edit Blog --}}
                        @if(isset($blog))
                          <input type="number" name="user_id" hidden class="form-control" required value="{{ $blog->user_id }}">
                          <input hidden name="blog_id" value="{{ $blog->id }}">
                        @endif

                        {{-- Create Blog --}}
                        @if (isset($user))
                          <!-- <h1> User id: {{ $user }} </h1> -->
                          <input type="number" name="user_id" hidden class="form-control" required value="{{ $user }}">
                        @endif
                    </div>

                    {{-- 4. Submit Buton --}}
                    <div class="text-center">
                        <button type="submit" class="custom-btn btn-1 purple-ice mt-5">Submit</button>
                    </div>

              </form> {{-- form end --}}
            </div> {{-- card-body form-bg p-5 --}}
        </div> {{-- card edit-form p-3 --}}
    </div> {{-- container --}}
@endsection
