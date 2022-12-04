<button type="button" class="btn btn-primary"><a href={{ route('listings.index') }}>Go back to all listings</a></button>

<hr>

<div>ID: {{ $listing->id }}</div>
<div>Listing description: {{ $listing-> listing_description }}</div>
<div>Listing address: {{ $listing->listing_address_subdivision_1 . "-" . $listing->listing_address_subdivision_2 . "-" . $listing->listing_address_subdivision_3 }}</div>
Image: <img src="{{ public_path('/images/').$listing->listing_image_path }}">
<div>Listing price: {{$listing['listing_price']}}</div>
<div>Listing rating: {{$listing['listing_rating']}}</div>
<div>Listing available: {{$listing['listing_available']}}</div>
<div>
    <div>Listing location:
        {{$x=$listing->listing_location->latitude}},{{$y=$listing->listing_location->longitude}}
    </div>
    <div style="margin: 0 20em">
        <iframe
            width="100%"
            height="500"
            style="border:0"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            src="https://maps.google.com/maps?q={{$x.",".$y}}&amp;t=&amp;z=12&amp;iwloc=B&amp;output=embed">
        </iframe>
    </div>
</div>
<div>Listing specification: {{ $listing['listing_specification_bedroom']." bedrooms,".$listing['listing_specification_bathroom']." bathrooms,". $listing['listing_specification_size']." m2" }}</div>
<div>Created at: {{$listing['created_at']}}, Updated at: {{$listing['updated_at']}}</div>
<div>Posted by: <a href={{ route('users.show', ['user' => $listing->user->id]) }}>{{ $listing->user->user_real_name }}</a></div>

<hr>

<div>
    {{ $listing }}
</div>
