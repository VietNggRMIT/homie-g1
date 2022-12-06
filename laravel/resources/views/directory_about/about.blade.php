<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'webfonts.css'])
    <title>{{ config('app.name', 'Laravel') }}</title>
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
            {{ Breadcrumbs::render('breadcrumb_about') }}
        </div>

        <hr>

        <h1>About Page</h1>
        <h2>Write about the company</h2>
    </div>
</body>
</html>
