{{-- assume that we have full right to delete --}}
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
        @if($from == 'edit')  
          <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{ url("edit-blog/{$blog_id}") }}">
          <h1>{{ 'edit' }}</h1>
        @else
          <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{ url('store-blog') }}">
          <h1>{{ 'create' }}</h1>
        @endif
      @endif
       @csrf
        <div class="form-group">
          <label for="blog_name">Blog name</label>
          <input type="text" id="blog_name" name="blog_name" class="form-control" required="true">
        </div>
        <div class="form-group">
          <label for="blog_description">Blog Description</label>
          <textarea name="blog_description" class="form-control" required="true"></textarea>
        </div>
        <div class="form-group">
            <label for="user_id">User ID - will be removed, here to test</label>
            <input type="number" name="user_id" class="form-control" required="">
        </div>
        <input hidden="true" name="blog_id" value="{{ $blog_id }}">
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>  
</body>
</html>