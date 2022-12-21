<head>
    <title>Add Listing</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    @php
      $cities = ['Ha Noi', 'Thanh Pho Ho Chi Minh'];
    @endphp
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
      Add Listing Post Form
    </div>
    <div class="card-body">
      <form name="add-listing-post-form" id="add-listing-post-form" method="post" action="{{url('store-listing')}}">
       @csrf
        <div class="form-group">
          <label for="listing_name">Listing name</label>
          <input type="text" id="listing_name" name="listing_name" class="form-control" required="true">
        </div>
        <div class="form-group">
          <label for="listing_description">Listing Description</label>
          <textarea name="listing_description" class="form-control" required="true"></textarea>
        </div>
        <div class="form-group dropdown">
            <label for="listing_address_subdivision1">Listing Address subdivision 1 - city or equivalence</label><br>
            {{-- <input type="text" id="listing_address_subdivision_1" name="listing_address_subdivision_1" class="form-control" required="true"> --}}
            <select name="listing_address_subdivision_1">
              @foreach ($cities as $city)
                <option value="{{ $city }}"> {{ $city }}</option>
              @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="listing_address_subdivision2">Listing Address subdivision 2 - street address</label>
            <input type="text" id="listing_address_subdivision_2" name="listing_address_subdivision_2" class="form-control" required="true">
        </div>
        <div class="form-group">
            <label for="listing_address_subdivision_3">Listing Address subdivision 3 - district or equivalence</label>
            <input type="text" id="listing_address_subdivision_3" name="listing_address_subdivision_3" class="form-control" required="true">
        </div>
        <div class="form-group">
            <label for="user_id">Coordinates - hard -> later</label>
            <input type="number" name="user_id" class="form-control" required="">
        </div>
        <div class="form-group">
            <label for="listing_specification_bathroom">Listing specification bathroom</label>
            <input type="number" name="listing_specification_bathroom" class="form-control" required="">
        </div>
        <div class="form-group">
            <label for="listing_specification_bedroom">Listing specification bedroom</label>
            <input type="number" name="listing_specification_bedroom" class="form-control" required="">
        </div>
        <div class="form-group">
            <label for="listing_specification_size">Listing specification size</label>
            <input type="number" name="listing_specification_size" class="form-control" required="">
        </div>
        <div class="form-group">
            <label for="listing_specification_owner">Listing specification owner</label>
            <input type="number" name="listing_specification_owner" class="form-control" required="">
        </div>
        <div class="form-group">
            <label for="listing_specification_tenant">Listing specification tenant</label>
            <input type="number" name="listing_specification_tenant" class="form-control" required="">
        </div>
        <div class="form-group">
            <label for="user_id">User ID - will be removed, here to test</label>
            <input type="number" name="user_id" class="form-control" required="">
        </div>
        <input type="text" id="listing_available" name="listing_available" hidden="true" value="{{ 1 }}">
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>  
</body>
</html>