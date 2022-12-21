<head>
    <title>Add Application</title>
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
      Add Application Post Form
    </div>
    <div class="card-body">
      <form name="add-application-post-form" id="add-application-post-form" method="post" action="{{url('store-application')}}">
       @csrf
        <div class="form-group">
          <label for="application_description">Application Description</label>
          <textarea name="application_description" class="form-control" required="true"></textarea>
        </div>
        <div class="form-group">
            <label for="listing_id">Listing ID - will be removed, here to test</label>
            <input type="number" name="listing_id" class="form-control" required="">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>  
</body>
</html>