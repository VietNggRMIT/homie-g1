<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/customScript.js', 'resources/js/app.js', 'webfonts.css'])
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>
    <div>
        <div>
            <button
                onclick="window.location.href='{{ route('route_home') }}';"
                type="button"
                class="btn btn-primary"
            >
                Home
            </button>
            <button
                onclick="window.location.href='{{ route('listings.index') }}';"
                type="button"
                class="btn btn-primary"
            >
                Listings
            </button>
            <button
                onclick="window.location.href='{{ route('blogs.index') }}'"
                type="button"
                class="btn btn-primary"
            >
                Blogs
            </button>
            <button
                onclick="window.location.href='{{ route('route_about') }}'"
                type="button"
                class="btn btn-primary"
            >
                About
            </button>
            <button
                onclick="window.location.href='{{ url()->previous() }}';"
                type="button"
                class="btn btn-primary"
            >
                Back to previous page
            </button>
        </div>

        <hr>

        <h1>Home Page</h1>

        <div>
            <div>There are
                <span data-purecounter-end="{{ $custom_count[0] }}" class="purecounter">0</span> listings available
                (<span data-purecounter-end="{{ $custom_count[1] }}" class="purecounter">0</span> listing images,
                <span data-purecounter-end="{{ $custom_count[2] }}" class="purecounter">0</span> reviews,
                <span data-purecounter-end="{{ $custom_count[3] }}" class="purecounter">0</span> applications)
            </div>
            <div>There are <span data-purecounter-end="{{ $custom_count[4] }}" class="purecounter">0</span> users online.</div>
            <div>There are <span data-purecounter-end="{{ $custom_count[5] }}" class="purecounter">0</span> blogs to read.</div>
        </div>

        <hr>



        <hr>

        <div>
            @for ($i = 0; $i < 50; $i++)
                <div>Empty line.</div>
            @endfor
        </div>
    </div>
</body>
</html>
