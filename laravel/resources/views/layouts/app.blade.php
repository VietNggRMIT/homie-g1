<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/customScript.js', 'resources/js/app.js', 'webfonts.css'])
        <title>@yield('title')</title>
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
                        <ul class="navbar-nav ms-auto nav-icons">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('route_home') }}"> <i class="fa-solid fa-house"></i> Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-circle-info"></i> Resources
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li><a class="dropdown-item" href="{{ route('route_article')}}">Articles</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="{{ route('route_about') }}">About us</a></li>
                                    <li><a class="dropdown-item" href="{{ route('route_privacy') }}">Privacy</a></li>
                                </ul>                                                
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"> <i class="fa-solid fa-user-gear"></i> User</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"> <i class="fa-solid fa-arrow-right-to-bracket"></i> Signin</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"> <i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link create-listing" href="#"> <i class="fa-solid fa-plus"></i> Create listing</a>
                            </li> -->
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
                
                        <div class="col-xs-6 col-md-3">
                            <h6>Categories</h6>
                            <ul class="footer-links">
                            <li><a href="{{ route('route_home') }}">Home</a></li>
                            <li><a href="{{ route('listings.index') }}">Listings</a></li>
                            <li><a href="{{ route('blogs.index') }}">Blogs</a></li>
                            <li><a href="{{ route('route_article') }}">Articles</a></li>
                            <li><a href="#">pages</a></li>
                            </ul>
                        </div>
                
                        <div class="col-xs-6 col-md-3">
                            <h6>Other</h6>
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

        </footer>
    </body>
</html>