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
<div id="main">
    	<div class="fof">
        		<h1>Error 404</h1>
                <br>
            <div class="frame">
                <button onclick="window.location.href='{{ route('route_home') }}';" type="button" class="custom-btn btn-1">
                    Homepages
                </button>
            </div>
    	</div>
</div>
</body>
</html>
