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

    <div class="container mx-auto">
        <div class="flex flex-col align-middle">
            <button
                onclick="window.location.href='{{ route('listings.index') }}';"
                type="button"
                class="text-gray-900 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 shadow-lg shadow-lime-500/50 dark:shadow-lg dark:shadow-lime-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                Show all listings
            </button>
            <button
                onclick="window.location.href='{{ route('blogs.index') }}'"
                type="button"
                class="text-gray-900 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 shadow-lg shadow-lime-500/50 dark:shadow-lg dark:shadow-lime-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                Show all blogs
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
