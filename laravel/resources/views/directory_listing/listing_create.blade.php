<head>
    <title>Add or Edit Listing</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    @vite(['resources/css/app.css', 'resources/js/customScript.js', 'resources/js/app.js', 'webfonts.css'])
    @php
      $provinces = ['Ha Noi','Ha Giang','Cao Bang','Bac Kan','Tuyen Quang','Lao Cai','Dien Bien','Lai Chau','Son La','Yen Bai','Hoa Binh','Thai Nguyen','Lang Son','Quang Ninh','Bac Giang','Phu Tho','Vinh Phuc','Bac Ninh','Hai Duong','Hai Phong','Hung Yen','Thai Binh','Ha Nam','Nam Dinh','Ninh Binh','Thanh Hoa','Nghe An','Ha Tinh','Quang Binh','Quang Tri','Thua Thien Hue','Da Nang','Quang Nam','Quang Ngai','Binh Dinh','Phu Yen','Khanh Hoa','Ninh Thuan','Binh Thuan','Kon Tum','Gia Lai','Dak Lak','Dak Nong','Lam Dong','Binh Phuoc','Tay Ninh','Binh Duong','Dong Nai','Ba Ria - Vung Tau','Ho Chi Minh','Long An','Tien Giang','Ben Tre','Tra Vinh','Vinh Long','Dong Thap','An Giang','Kien Giang','Can Tho','Hau Giang','Soc Trang','Bac Lieu','Ca Mau'];
    @endphp
</head>
<body>
  <div class="container mt-4">
  @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
  <div class="card edit-form">
    <!-- <div class="card-header text-center font-weight-bold">
      Add Or Edit Listing Form
    </div> -->
    <div class="card-body">
      @if($from)
        @if($from == 'update')
          @if(isset($listing))
          <div class="text-center">
            <h1>Update listing</h1>
          </div>
          <!-- <h2>Updating:  {{ $listing->listing_name }} </h2> -->
            <form name="add-listing-post-form" id="add-listing-post-form" method="post" action="{{ url("update-listing/{$listing->id}") }}">
          @endif
        @else
          <!-- <h1>debug message - create</h1> -->
          <form name="add-listing-post-form" id="add-listing-post-form" method="post" action="{{ url('store-listing') }}">
        @endif
      @endif
        @csrf
        <div class="form-group">
          <label for="listing_name">Listing name</label>
          @if (isset($listing))
            <input type="text" id="listing_name" name="listing_name" class="form-control" required="true" value="{{ $listing->listing_name}}">
          @else
            <input type="text" id="listing_name" name="listing_name" class="form-control" required="true">
          @endif

        </div>
        <div class="form-group">
          <label for="listing_description">Listing Description</label>
          @if (isset($listing))
            <textarea name="listing_description" class="form-control" required="true" value="{{ $listing->listing_description}}"></textarea>
          @else
            <textarea name="listing_description" class="form-control" required="true"></textarea>
          @endif
          
        </div>
        <div class="form-group dropdown">
            <label for="listing_address_subdivision1">Listing Address subdivision 1 - province or equivalence</label><br>
            <select name="listing_address_subdivision_1">
              @foreach ($provinces as $province)
                <option value="{{ $province }}"> {{ $province }}</option>
              @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="listing_address_subdivision2">Listing Address subdivision 2 - street address</label>
            @if (isset($listing))
              <input type="text" id="listing_address_subdivision_2" name="listing_address_subdivision_2" class="form-control" value="{{ $listing->listing_address_subdivision_2}}">
            @else
              <input type="text" id="listing_address_subdivision_2" name="listing_address_subdivision_2" class="form-control">
            @endif
        </div>

        <div class="form-group">
            <label for="listing_address_subdivision_3">Listing Address subdivision 3 - district or equivalence</label>
            @if (isset($listing))
              <input type="text" id="listing_address_subdivision_3" name="listing_address_subdivision_3" class="form-control" value="{{ $listing->listing_address_subdivision_3 }}">
            @else
              <input type="text" id="listing_address_subdivision_3" name="listing_address_subdivision_3" class="form-control">
            @endif
        </div>

        <div class="form-group aaaaaaaaaaaaaaaaa">
            <label for="listing_address_coordinate">Coordinates - hard -> later</label>
            <input type="number" name="listing_address_coordinate" class="form-control" required="">
        </div>

        <div class="form-group">
          <label for="listing_price">Listing price -- rent per month, in VND</label>
          @if (isset($listing))
            <input type="number" name="listing_price" class="form-control" value="{{ $listing->listing_price }}">
          @else
            <input type="number" name="listing_price" class="form-control">
          @endif
      </div>

        <div class="form-group">
            <label for="listing_specification_bathroom">Listing specification - bathroom</label>
            @if (isset($listing))
              <input type="number" name="listing_specification_bathroom" class="form-control" value="{{ $listing->listing_specification_bathroom }}">
            @else
              <input type="number" name="listing_specification_bathroom" class="form-control">
            @endif
        </div>

        <div class="form-group">
            <label for="listing_specification_bedroom">Listing specification bedroom</label>
            @if (isset($listing))
              <input type="number" name="listing_specification_bedroom" class="form-control" value="{{ $listing->listing_specification_bedroom }}">
            @else
              <input type="number" name="listing_specification_bedroom" class="form-control">
            @endif
        </div>

        <div class="form-group">
            <label for="listing_specification_size">Listing specification - size (in m2)</label>
            @if (isset($listing))
              <input type="number" name="listing_specification_size" class="form-control" value="{{ $listing->listing_specification_size }}">
            @else
              <input type="number" name="listing_specification_size" class="form-control">
            @endif
        </div>
        <div class="form-group">
            <label for="listing_specification_owner">Listing specification - lives with owner: 1 for yes, 0 for no</label>
            @if (isset($listing))
              <input type="number" name="listing_specification_owner" class="form-control" value="{{ $listing->listing_specification_owner }}">
            @else
              <input type="number" name="listing_specification_owner" class="form-control">
            @endif
        </div>
        <div class="form-group">
            <label for="listing_specification_tenant">Listing specification - number of tenants per listing</label>
            @if (isset($listing))
              <input type="number" name="listing_specification_tenant" class="form-control" value="{{ $listing->listing_specification_tenant }}">
            @else
              <input type="number" name="listing_specification_tenant" class="form-control">
            @endif
        </div>

        <div class="form-group aaaaaaaaaaaaaaaaaaaa">
          @if(isset($listing))
          {{-- edit the listing --}}
            <input type="number" name="user_id" hidden="true" class="form-control" value="{{ $listing->user_id }}">
            <input hidden="true" name="listing_id" value="{{ $listing->id }}">
            <!-- <h1> edit </h1> -->
          @endif

          @if (isset($user))
          {{-- create a listing --}}
            <!-- <h1> User id: {{ $user }} </h1> -->
            <input type="number" name="user_id" hidden="true" class="form-control" value="{{ $user }}">
          @endif
        </div>

        <input type="text" id="listing_available" name="listing_available" hidden="true" value="1">
        <div class="text-center">
          <button type="submit" class="custom-btn btn-1">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>  
</body>
</html>