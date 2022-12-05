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
    <div>
        <button
            onclick="window.location.href='{{ route('listings.index') }}';"
            type="button"
        >
            Back to all listings
        </button>

        <hr>

        <h1>Listing name: {{ $listing->listing_name }}</h1>
        <div>ID: {{ $listing->id }}</div>
        <div>Listing description: {{ $listing->listing_description }}</div>
        <div>Listing address: {{ $listing->listing_address_subdivision_1 . "-" . $listing->listing_address_subdivision_2 . "-" . $listing->listing_address_subdivision_3 }}</div>
        <div>
            @foreach ($listing->listingimages as $listingimage)
                <img
                    src="{{ asset('storage/images/').'/'.$listingimage->listing_image_path }}"
                    width="100"
                    height="100%"
                >
            @endforeach
        </div>
        <div>Listing price: {{ number_format( (int) $listing->listing_price) }}</div>
        <div>Listing rating: {{ $listing->listing_rating }}</div>
        <div>Listing available: {{ $listing->listing_available }}</div>
        <div>
            <div>Listing location:
                {{ $x=$listing->listing_address_coordinate->latitude }},{{ $y=$listing->listing_address_coordinate->longitude }}
            </div>
            <div style="margin: 0 20em">
                <iframe
                    width="400"
                    height="300"
                    style="border:0"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    src="https://maps.google.com/maps?q={{$x.",".$y}}&amp;t=&amp;z=12&amp;iwloc=B&amp;output=embed">
                </iframe>
            </div>
        </div>
        <div>Listing specification: {{ $listing->listing_specification_bedroom." bedrooms,".$listing->listing_specification_bathroom." bathrooms,". $listing->listing_specification_size." m2" }}</div>
        <div>Created at: {{ $listing->created_at }}, Updated at: {{ $listing->updated_at }}</div>
        <div>Posted by: <a href={{ route('users.show', ['user' => $listing->user]) }}>{{ $listing->user->user_real_name }}</a></div>
    </div>
    @vite('resources/js/app.js')
    @vite('webfonts.css')
</body>
</html>
