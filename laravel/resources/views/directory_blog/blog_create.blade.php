{{-- assume that we have full right to edit all blog posts --}}
{{-- to do: check if the blog editor is the same as the blog owner --}}
@php
    use Carbon\Carbon;
@endphp
<head>
    <title>Add or Edit Blog</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-4">
  @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
  <div class="card">
    <div class="card-header text-center font-weight-bold">
      Add or Edit Blog Post Form
    </div>
    <div class="card-body">
      @if($from)
        @if($from == 'update')
          @if(isset($blog))
            <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{ url("update-blog/{$blog->id}") }}">
            <h1>debug message - update</h1>
          @endif
        @else
          <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{ url('store-blog') }}">
          <h1>debug message - create</h1>
        @endif
      @endif
       @csrf
        <div class="form-group">
          <label for="blog_name">Blog name</label>
          @if(isset($blog))
            <input type="text" id="blog_name" name="blog_name" class="form-control" required="true" value="{{ $blog->blog_name }}">
          @else
            <input type="text" id="blog_name" name="blog_name" class="form-control" required="true">
          @endif
        </div>
        <div class="form-group">
          <label for="blog_description">Blog Description</label>
          @if(isset($blog))
            <textarea name="blog_description" id="blog_description" class="form-control" required="true" >{{ $blog->blog_description }}</textarea>
          @else
            <textarea name="blog_description" class="form-control" required="true"></textarea>
          @endif
        </div>
        <div class="form-group">
            @if(isset($blog))
            {{-- edit the blog --}}
              <input type="number" name="user_id" hidden="true" class="form-control" required="" value="{{ $blog->user_id }}">
              <input hidden="true" name="blog_id" value="{{ $blog->id }}">
              <h1> edit </h1>
            @endif
            @if (isset($user))
            {{-- create a blog --}}
              <h1> User id: {{ $user }} </h1>
              <input type="number" name="user_id" hidden="true" class="form-control" required="" value="{{ $user }}">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>  
</body>
</html>