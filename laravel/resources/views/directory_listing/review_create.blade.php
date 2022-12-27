<head>
    <title>Add Review</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    @vite(['resources/css/app.css', 'resources/js/customScript.js', 'resources/js/app.js', 'webfonts.css'])
</head>
<body>
  <div class="container mt-4">
  @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
  <div class="card edit-form">
    <div class="card-header text-center font-weight-bold">
      Add Review For This Listing
    </div>
    <div class="card-body">
      <form name="add-review-post-form" id="add-review-post-form" method="post" action="{{ url('store-review') }}">
       @csrf
        <div class="form-group">
          <label for="review_name">Review Name</label>
          <input type="text" id="review_name" name="review_name" class="form-control" required="true">
        </div>
        <div class="form-group">
          <label for="review_description">Review Description</label>
          <textarea name="review_description" class="form-control" required="true"></textarea>
        </div>
        <div class="form-group">
            <label for="review_rating">Rating</label>
            <input type="number" name="review_rating" class="form-control" required="">
        </div>
        <div class="form-group">
            @if ($listing)
            {{-- listing id --}}
              <input type="number" name="listing_id" hidden="true" class="form-control" value={{ $listing }}>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>  
</body>
</html>