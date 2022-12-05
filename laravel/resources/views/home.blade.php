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
<body class="">
{{--    <div class="flex flex-col">--}}
{{--        <!-- Navbar -->--}}
{{--        <nav class="flex justify-around py-4 bg-white/80--}}
{{--                backdrop-blur-md shadow-md w-full--}}
{{--                fixed top-0 left-0 right-0 z-10">--}}

{{--            <!-- Logo Container -->--}}
{{--            <div class="flex items-center">--}}
{{--                <!-- Logo -->--}}
{{--                <a class="cursor-pointer">--}}
{{--                    <h3 class="text-2xl font-medium text-blue-500">--}}
{{--                        <img class="h-10 object-cover"--}}
{{--                             src="https://staticfile.batdongsan.com.vn/images/logo/standard/red/logo.svg" alt="Store Logo">--}}
{{--                    </h3>--}}
{{--                </a>--}}
{{--            </div>--}}

{{--            <!-- Links Section -->--}}
{{--            <div class="items-center hidden space-x-20 lg:flex">--}}
{{--                <a class="header-font text-2xl flex text-gray-600--}}
{{--                        cursor-pointer transition-colors duration-300--}}
{{--                        font-semibold text-blue-600">--}}
{{--                    Home--}}
{{--                </a>--}}

{{--                <a class="header-font text-2xl flex text-gray-600 hover:text-blue-500--}}
{{--                        cursor-pointer transition-colors duration-300">--}}
{{--                    Listings--}}
{{--                </a>--}}

{{--                <a class="header-font text-2xl flex text-gray-600 hover:text-blue-500--}}
{{--                        cursor-pointer transition-colors duration-300">--}}
{{--                    Blogs--}}
{{--                </a>--}}

{{--                <a class="header-font text-2xl flex text-gray-600 hover:text-blue-500--}}
{{--                        cursor-pointer transition-colors duration-300">--}}
{{--                    About--}}
{{--                </a>--}}
{{--            </div>--}}

{{--            <!-- Icon Menu Section -->--}}
{{--            <div class="flex items-center space-x-5">--}}
{{--                <!-- Register -->--}}
{{--                <a class="header-font text-2xl flex text-gray-600 hover:text-blue-500--}}
{{--                        cursor-pointer transition-colors duration-300">--}}
{{--                    Register--}}
{{--                </a>--}}

{{--                <!-- Login -->--}}
{{--                <a class="header-font text-2xl flex text-gray-600 hover:text-blue-500--}}
{{--                        cursor-pointer transition-colors duration-300">--}}
{{--                    Login--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </nav>--}}
{{--    </div>--}}
    <nav class="sticky top-0 z-10 bg-white backdrop-filter backdrop-blur-lg bg-opacity-30 border-gray-200">
        <div class="max-w-5xl mx-auto px-4">
            <div class="flex items-center justify-between h-16">
                <span class="text-2xl text-gray-900 font-semibold"><h5>Rentals Website</h5></span>
                <div class="flex space-x-4 text-gray-900">
                    <a href="#">Listings</a>
                    <a href="#">Blogs</a>
                    <a href="#">About</a>
                    <a href="#">Sign In/Sign Up</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mx-auto">
        <div class="flex flex-col align-middle">
            <button
                onclick="window.location.href='{{ route('listings.index') }}';"
                type="button"
                class="text-gray-900 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 shadow-lg shadow-lime-500/50 dark:shadow-lg dark:shadow-lime-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                Show all listings
            </button>
            <div>There are
                <span data-purecounter-end="{{ $listings }}" class="text-3xl purecounter">0</span> listings available
                (<span data-purecounter-end="{{ $listingimages }}" class="text-3xl purecounter">0</span> listing images,
                <span data-purecounter-end="{{ $reviews }}" class="text-3xl purecounter">0</span> reviews,
                <span data-purecounter-end="{{ $applications }}" class="text-3xl purecounter">0</span> applications)
            </div>
            <div>There are <span data-purecounter-end="{{ $users }}" class="text-3xl purecounter">0</span> users online.</div>
            <div>There are <span data-purecounter-end="{{ $blogs }}" class="text-3xl purecounter">0</span> blogs to read.</div>
            <div class="flex flex-col justify-center">
                @for ($i = 0; $i < 50; $i++)
                    <div>Empty line.</div>
                @endfor
            </div>
        </div>
    </div>

    @vite('resources/js/app.js')
    @vite('webfonts.css')
</body>
</html>
