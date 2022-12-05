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
        <div>
            <button
                onclick="window.location.href='{{ route('route_home') }}';"
                type="button"
            >
                Home
            </button>
            <button
                onclick="window.location.href='{{ route('listings.index') }}';"
                type="button"
            >
                Show all listings
            </button>
            <button
                onclick="window.location.href='{{ route('blogs.index') }}'"
                type="button"
            >
                Show all blogs
            </button>
            <button
                onclick="window.location.href='{{ route('route_about') }}'"
                type="button"
            >
                About
            </button>
            <button
                onclick="window.location.href='{{ url()->previous() }}';"
                type="button"
            >
                Back to previous page
            </button>
        </div>
        <hr>

        <div>
            <h1>User</h1>
            <div>$user->id: {{ $user->id }}</div>
            <div>$user->user_description: {!!  nl2br(e($user->user_description)) !!}</div>
            <div>
                $blog->user->user_real_name:
                <button
                    onclick="window.location.href='{{ route('users.show', ['user' => $user]) }}';"
                    type="button"
                >
                    {{ $user->user_real_name }}
                </button>
            </div>
            <div>
                $user->user_image_path:
                <img
                    src="{{ asset('storage/images/').'/'.$user->user_image_path }}"
                    style="width:100px;height:100%;object-fit: cover;"
                >
            </div>
            <div>$user->user_password: {{ $user->user_password }}</div>
            <div>$user->user_phone_number: {{ $user->user_phone_number }}</div>
            <div>$user->user_email_address: {{ $user->user_email_address }}</div>
            <div>$user->created_at: {{ $user->created_at }}</div>
            <div>$user->created_at: {{ $user->updated_at }}</div>
        </div>

        <hr>

        <div>
            <h1>Listings</h1>
            @foreach($user->listings as $listing)
                <div>
                    <div>$listing->id: {{ $listing->id }}</div>
                    <div>
                        $listing->listing_name:
                        <button
                            onclick="window.location.href='{{ route('listings.show', ['listing' => $listing]) }}'"
                            type="button"
                        >
                            {{ $listing->listing_name }}
                        </button>
                    </div>

                    <div>$listing->reviews_count: {{ $listing->reviews_count }}</div>
                    <div>$listing->applications_count:  {{ $listing->applications_count }}</div>

                    <div>
                        $listing->listingimages:
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
                </div>
                <br>
            @endforeach
        </div>

        <hr>

        <div>
            <h1>Blogs</h1>
            @foreach($user->blogs as $blog)
                <div>
                    <div>$blog->id: {{ $blog->id }}</div>
                    <div>
                        $blog->blog_name:
                        <button
                            onclick="window.location.href='{{ route('blogs.show', ['blog' => $blog]) }}'"
                            type="button"
                        >
                            {{ $blog->blog_name }}
                        </button>
                    </div>
                </div>
                <br>
            @endforeach
        </div>

    </div>

    @vite('resources/js/app.js')
    @vite('webfonts.css')
</body>
</html>
