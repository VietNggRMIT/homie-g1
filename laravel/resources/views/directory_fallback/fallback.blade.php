<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @vite(['resources/css/app.css', 'resources/js/app.js', 'webfonts.css'])
        <title>Error 404</title>
    </head>
    <body>
        <div id="main">
            <div class="fof">
                <h1>Error 404</h1>
                <br>
                <div class="frame">
                    <h2 class="mb-5">Perhaps you want to...</h2>
                    <button onclick="window.location.href='{{ route('route_home') }}';" type="button" class="custom-btn btn-1">
                        Home
                    </button>
                    <button onclick="window.location.href='{{ route('listings.index') }}';" type="button" class="custom-btn btn-1">
                        Listings
                    </button>
                    <button onclick="window.location.href='{{ route('blogs.index') }}';" type="button" class="custom-btn btn-1">
                        Blogs
                    </button>
                </div>
            </div>
        </div>
    </body>
</html>
