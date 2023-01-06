<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/customScript.js', 'resources/js/app.js', 'webfonts.css'])
    <title>@yield('title')</title>
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">--}}
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container">
                    <a class="navbar-brand me-auto" href="#">
                        <img class="web-logo" src="{{ asset('storage/images/logo/logo.png')}}" alt="brand logo" onclick="window.location.href='{{ route('route_home') }}';">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        {{-- /*****************************************************************************
                        The code below uses elements from:
                        *Title: Database: Routing
                        *Author: Laravel
                        *Code version: 9.x
                        *Availability: https://laravel.com/docs/9.x/routing (Accessed 5 November 2022)
                        *****************************************************************************/ --}}
                        <ul class="navbar-nav ms-auto nav-icons align-items-center">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('route_home') }}"> <i class="fa-solid fa-house"></i> Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('listings.index') }}"> <i class="fa-solid fa-house-circle-check"></i> Property Listings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('blogs.index') }}"> <i class="fa-solid fa-pen"></i> Blogs</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-bars"></i> Resources
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li><a class="dropdown-item" href="{{ route('route_article')}}">Articles</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="{{ route('route_about') }}">About Us</a></li>
                                    <li><a class="dropdown-item" href="{{ route('route_privacy') }}">Privacy</a></li>
                                </ul>
                            </li>
                            @if(session('user'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('users.show', ['user' => session('user')]) }}">
                                        <div class="d-flex">
                                            <div style="width: 25px; height: 25px">
                                                <img class="img-fluid rounded" src="{{ asset('storage/images/').'/'.session('user')->user_image_path }}" alt="profile image">
                                            </div>
                                            <div class="ms-1">{{ session('user')->user_email_address }}</div>
                                        </div>
                                    </a>
                                </li>
                                <form class="nav-item" method="POST" action="{{ url("logout/{session('user')}") }}">
                                    @csrf
                                    <button class="btn btn-outline-danger me-2" type="submit">Log out</button>
                                </form>
                                <li class="nav-item">
                                    <a class="nav-link create-listing" href="{{ route('listings.create', ['user' => session('user')->id]) }}"> <i class="fa-solid fa-plus"></i> Create listing</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login.create')}}"> <i class="fa-solid fa-arrow-right-to-bracket"></i> Log in</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('users.create')}}"> <i class="fa-solid fa-arrow-right-to-bracket"></i> Sign up</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <main>
            <div class="main-wrapper">
                @yield('content')
            </div>
        </main>
        <footer class="footer">

            <div class="footer-wrapper">

                <div class="container">

                    <div class="row">

                        <div class="col-sm-12 col-md-6 about-section">
                            <h6>A few word</h6>
                            <p class="text-justify">
                            Our group HOMIE (House Ordering & Management Intelligence Enterprise) has decided to solve house rental
                            and room rental problems by creating a web app solution that works as a central ecommerce platform for
                            tenant and landlord to connect, advertise or buy service. We aimed to solve the transparency of renting
                            contracts, as well as pricing and provide a managing solution for landlords with multiple housing for
                            rent. This is our demo product but will not be our final product as we can expand it bigger in
                            the future should we pursue it.
                            </p>
                        </div>
                        {{-- /*****************************************************************************
                        The code below uses elements from:
                        *Title: Database: Routing
                        *Author: Laravel
                        *Code version: 9.x
                        *Availability: https://laravel.com/docs/9.x/routing (Accessed 5 November 2022)
                        *****************************************************************************/ --}}
                        <div class="col-xs-6 col-md-3">
                            <h6>Categories</h6>
                            <ul class="footer-links">
                            <li><a href="{{ route('route_home') }}">Home</a></li>
                            <li><a href="{{ route('listings.index') }}">Property Listings</a></li>
                            <li><a href="{{ route('blogs.index') }}">Blogs</a></li>
                            <li><a href="{{ route('route_article') }}">Articles</a></li>
                            </ul>
                        </div>

                        <div class="col-xs-6 col-md-3">
                            <h6>Others</h6>
                            <ul class="footer-links">
                            <li><a href="{{ route('route_about') }}">About Us</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="{{ route('route_privacy') }}">Privacy Policy</a></li>
                            </ul>
                        </div>

                    </div>
                    <hr>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <p class="copyright-text">Copyright &copy; 2022 All Rights Reserved by
                            <a href="#">Homie (Group 1 Tutorial Hanoi)</a>.
                            </p>
                        </div>

                        <div class="col-md-5 col-sm-6 col-xs-12">
                            <ul class="social-icons">
                            <img class="footer-logo" src="{{ asset('storage/images/logo/logo.png')}}" alt="logo">
                            <li><a class="facebook" href="#"><i class="fa-brands fa-facebook"></i></a></li>
                            <li><a class="github" href="https://github.com/VietNggRMIT/homie-g1"><i class="fa-brands fa-github"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

        </footer>
{{--        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>--}}
    </body>
</html>
