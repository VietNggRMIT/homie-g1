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
            onclick="window.location.href='{{ route('route_home') }}';"
            type="button"
        >
            Back to Home
        </button>
        <button
            onclick="window.location.href='{{ url()->previous() }}';"
            type="button"
        >
            Back to previous page
        </button>

        <hr>

        @foreach($custom_blogs as $blog)
            <div>
                <div>$blog->id: {{ $blog->id }}</div>
                <div>
                    $blog->blog_name:
                    <button
                        onclick="window.location.href='{{ route('blogs.show', ['blog' => $blog]) }}';"
                        type="button"
                    >
                        {{ $blog->blog_name }}
                    </button>
                </div>
                <div>$blog->blog_description: {!!  nl2br(e($blog->blog_description)) !!}</div>
                <div>$blog->user_id: {{ $blog->user_id }}</div>
                <div>$blog->created_at: {{ $blog->created_at }}</div>
                <div>$blog->updated_at: {{ $blog->updated_at }}</div>
            </div>
            <fieldset>
                <legend>Posted by:</legend>
                <div>$blog->user->id: {{ $blog->user->id }}</div>
                <div>
                    $blog->user->user_real_name:
                    <button
                        onclick="window.location.href='{{ route('users.show', ['user' => $blog->user]) }}';"
                        type="button"
                    >
                        {{ $blog->user->user_real_name }}
                    </button>
                </div>
            </fieldset>
            <hr>
        @endforeach
    </div>

    @vite('resources/js/app.js')
    @vite('webfonts.css')
</body>
</html>
