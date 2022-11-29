<button type="button" class="btn btn-primary"><a href="/">Go back to all listings</a></button>

<hr>

<div>ID: {{$listing['id']}}</div>
<div>Listing description: {{$listing['listing_description']}}</div>
<div>Listing address: {{$listing['listing_address_subdivision_1'] . "-" . $listing['listing_address_subdivision_2']}}</div>
Image: <img src="{{$listing['listing_image']}}">
<div>Listing price: {{$listing['listing_price']}}</div>
<div>Listing rating: {{$listing['listing_rating']}}</div>
<div>Listing available: {{$listing['listing_available']}}</div>
<div>Created at: {{$listing['created_at']}}, Updated at: {{$listing['updated_at']}}</div>
<div>Posted by: {{ $user }}</div>
