<head>
    <title>Add Application</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    @vite(['resources/css/app.css', 'resources/js/customScript.js', 'resources/js/app.js', 'webfonts.css'])
</head>
<body>
  <div class="container mt-4">
  @if($listing)
    <div class="card edit-form">
      <div class="text-center">
        <h1>Application form</h1>
      </div>
      <div class="card-body">
        <form name="add-application-post-form" id="add-application-post-form" method="post" action="{{url('store-application')}}">
        @csrf
          {{-- <label for="application_description">Application Description</label>
          <textarea name="application_description" class="form-control" required="true"></textarea> --}}
          <label for="applicant">Applicant name</label>
          <input type="text" id="applicant" name="applicant" class="form-control" required="true">
          <label for="phone">Contact phone number</label>
          <input type="text" id="phone" name="phone" class="form-control" required="true">
          <label for="email">Contact email</label>
          <input type="text" id="email" name="email" class="form-control" required="true">
          <label for="dateofbirth">Date of birth (dd/mm/yyyy)</label>
          <input type="text" id="dateofbirth" name="dateofbirth" class="form-control" required="true">
          <hr>
          <label for="occupancy">Expected duration of occupancy (e.g. 6 months)</label>
          <input type="text" id="occupancy" name="occupancy" class="form-control" required="true">
          <label for="movein">Expected move in date (dd/mm/yyyy)</label>
          <input type="text" id="movein" name="movein" class="form-control" required="true">
          <label for="payment">Expected monthly payment method (e.g. cash, card, check)</label>
          <input type="text" id="payment" name="payment" class="form-control" required="true">

          <label>Do you have a vehicle?</label>
          <input type="radio" id="y_vehicle" name="vehicle" required="true" value="Yes">
          <label for="y_vehicle">Yes</label>
          <input type="radio" id="n_vehicle" name="vehicle" required="true" value="No">
          <label for="n_vehicle">No</label><br>

          <label>Do you have pets?</label>
          <input type="radio" id="y_pet" name="pet" required="true" value="Yes">
          <label for="y_pet">Yes</label>
          <input type="radio" id="n_pet" name="pet" required="true" value="No">
          <label for="n_pet">No</label><br>
          <hr>
          <label for="job">Current job title and employer</label>
          <input type="text" id="job" name="job" class="form-control" required="true">
          <label for="income">Current annual gross income (in VND)</label>
          <input type="number" id="income" name="income" class="form-control" required="true">
          <label for="address">Current address</label>
          <input type="text" id="address" name="address" class="form-control" required="true">
          <label for="reason">Reason of leaving</label>
          <input type="text" id="reason" name="reason" class="form-control" required="true">
          <label for="landlord">Previous landlord phone number</label>
          <input type="text" id="landlord" name="landlord" class="form-control" required="true">

          <label for="evicted">Have you ever been evicted before?</label>
          <input type="radio" id="y_evicted" name="evicted" required="true" value="Yes">
          <label for="y_evicted">Yes</label>
          <input type="radio" id="n_evicted" name="evicted" required="true" value="No">
          <label for="n_evicted">No</label><br>

          <label>Have you ever been convicted of a crime or felony?</label>
          <input type="radio" id="y_convicted" name="convicted" required="true" value="Yes">
          <label for="y_convicted">Yes</label>
          <input type="radio" id="n_convicted" name="convicted" required="true" value="No">
          <label for="n_convicted">No</label><br>
          <hr>
          <div class="form-group">
              {{-- <br><label for="listing_id">Listing ID - will be removed, here to test</label> --}}
              <input type="number" name="listing_id" hidden="true" value="{{ $listing }}">
          </div>
          <div class="text-center">
            <button type="submit" class="custom-btn btn-1">Submit</button>
          </div>
        </form>
      </div>
    </div>
  @endif
</div>  
</body>
</html>