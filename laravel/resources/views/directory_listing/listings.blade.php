<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body>
    <button
        onclick="window.location.href='{{ route('route_home') }}';"
        type="button"
    >
        Back to Home
    </button>

    <hr>

    @foreach ($listings_true as $listing)

    <h1>
        <a href={{ route('listings.show', ['listing' => $listing->id]) }}>Listing name: {{ $listing->listing_name }}</a>
    </h1>

    <div {!! $listing->listing_available == 0 ? 'style="opacity: 0.4"' : 'style="opacity: 1"' !!}>
        <div>ID: {{ $listing->id }}</div>
        <div>Listing description: {{ $listing->listing_description }}</div>
        <div>Listing address: {{ $listing->listing_address_subdivision_1 . "-" . $listing->listing_address_subdivision_2 }}</div>
            <div>
                Images:
                @if($listing->listingimages->isEmpty())
                    <img
                        src="https://via.placeholder.com/300.png/"
                        width="100"
                        height="100%"
                    >
                @else
                    @foreach ($listing->listingimages as $listingimage)
                        <img
                            src="{{ asset('storage/images/').'/'.$listingimage->listing_image_path }}"
                            width="100"
                            height="100%"
                        >
                    @endforeach
                @endif
            </div>
        <div>Listing price: {{ number_format( (int) $listing->listing_price) }}</div>

        <div>Listing available: {{ $listing->listing_available }}</div>
        <div>Listing location (Lat, Long): {{ $listing->listing_address_coordinate->latitude.",".$listing->listing_address_coordinate->longitude }}</div>
        <div>Listing specification: {{ $listing->listing_specification_bedroom." bedrooms,".$listing->listing_specification_bathroom." bathrooms,". $listing->listing_specification_size." m2" }}</div>
        <div>User ID: {{ $listing->user_id }}</div>
        <div>Created at: {{ $listing->created_at }}, Updated at: {{ $listing->updated_at }}</div>
        <div>Posted by: <a
                href={{ route('users.show', ['user' => $listing->user_id]) }}> {{ $listing->user->user_real_name }}</a>
        </div>
        <hr>
        <div>Ratings count: {{ (float) $listing->reviews_avg_review_rating }} stars from {{ (int) $listing->reviews_count }} reviews</div>
        <div>Applications count: {{ (float) $listing->applications_count }} applications</div>
    </div>
    <hr>
@endforeach

    @vite('resources/js/app.js')
    @vite('webfonts.css')
</body>
</html>
