<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'webfonts.css'])
    @livewireStyles
    <title>@yield('title')</title>
{{--    <title>@section('title','My Title')</title>--}}
</head>
<body>
    <div class="container">

    </div>
    @livewireScripts
</body>
</html>
