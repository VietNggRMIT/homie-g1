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
        onclick="window.location.href='{{ route('listings.index') }}';"
        type="button"
    >
        Back to all listings
    </button>

    <hr>

    <div>ID: {{$user->id}}</div>
    <div>User description: {{$user->user_description}}</div>
    <div>User real name: {{$user->user_real_name}}</div>
    <div>User password: {{$user->user_password}}</div>
    <div>User contact: {{$user->user_phone_number . "-" . $user->user_email_address}}</div>
    <div>Created at: {{$user->created_at}}, Updated at: {{$user->updated_at}}</div><br>

    <div>Available listings:<div>
        @foreach ($user->listings as $listing)
            <div>
                <a href="{{ route('listings.show', ['listing' => $listing->id]) }}">{{$listing->listing_name}}</a>
                <span>Reviews count: {{ $listing->reviews_count }}</span>
                <span>Applications count:  {{ $listing->applications_count }}</span>
                <div>
                    Images:
                    @if($listing->listingimages->isEmpty())
                        <img
                            src="https://via.placeholder.com/300.png/"
                            style="width:100px;height:100%;object-fit: contain;"
                        >
                    @else
                        @foreach ($listing->listingimages as $listingimage)
                            <img
                                src="{{ asset('storage/images/').'/'.$listingimage->listing_image_path }}"
                                style="width:100px;height:100%;object-fit: cover;"
                            >
                        @endforeach
                    @endif
                </div>
                <div>
    @endforeach
@vite('resources/js/app.js')
@vite('webfonts.css')
</body>
</html>
