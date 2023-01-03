@extends('layouts.app')
@section('title', 'About Us')
@section('content')
<body>
        <main>
            <div class="main-wrapper">
                <div class="container-fluid about-box">
                    <div id="banner-box-1">
                        <div class="content">
                            <div class="row">
                                <div class="text-center">
                                    <div id="story-about">
                                    <h2>The Story of Homie Rental</h2>
                                        <p>It started as a team project for building IT system<br/>
                                            to solve one of the most commonly occured problem <br>
                                            that new college students (fresh man) often faces, <br>
                                            which is housing/room rental. <br><br>
                                            The time according to the system is: <p class="text-primary">{{ now() }}</p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid" id="banner-box-2">
                    <div class="row justify-content-center">
                        <div class="col" id="why-box">
                            <p><h2>Why do we choose this project?</h2><br>
                            Having first-hand experience on this issues,<br>
                            and with the increasing amount of student <br>
                            enroll in university, it is a common problems<br>
                            with no dedicated solutions. We want to take <br>
                            matter into our hand, knowing how problematic <br>
                            this has become in recent year. <br><br>
                            <q class="quote">If not us, then who?</q>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="breadcrumb justify-content-center">
                <h2>{{ Breadcrumbs::render('breadcrumb_about') }}</h2>
            </div>
            <div id="mission-box">
                <div class="content-box-lag">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mission text-center">
                                    <i class="fa-solid fa-book"></i>
                                    <h3>Mission</h3>
                                    <hr>
                                    <p>We aimed to solve the transparency of renting contracts, as well as pricing and provide a managing solution for landlords with multiple housing for rent</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mission text-center">
                                    <i class="fa-solid fa-shield-halved"></i>
                                    <h3>Policy</h3>
                                    <hr>
                                    <p>Our platform will only permit realtors to list the final rent rate, any additional charges, such as those for pets or extra parking, are up to the tenants' discretion.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mission text-center">
                                    <i class="fa-regular fa-lightbulb"></i>
                                    <h3>Vision</h3>
                                    <hr>
                                    <p>We want to create a web-app solution that works as a central ecommerce platform for tenant and landlord to connect, advertise or buy service</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-about">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Feature</th>
                        <th scope="col">Priority</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td><p>Unique user accounts for property managers.</p>
                <ul>
                    <li>
                        <p>Create, view, and edit profile and listings.</p>
                    </li>
                    <li>
                        <p>Listings require valid documents (contracts, past bills) and contact information from landlords.</p>
                    </li>
                </ul></td>
                        <td><p>High: this feature allows property owners to manage their account and properties on the site.</p>
                <p>High: relevant information is instrumental to prove the validity and honest practice of property managers.&nbsp;</p></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td><p>Listing affordable housing options.</p>
                <ul>
                    <li>
                        <p>Show information of listings (required information provided in &lsquo;Technical Plan&rsquo;; other information includes reviews and ratings).</p>
                    </li>
                    <li>
                        <p>Filter and search for properties based on location, price, or ratings.</p>
                    </li>
                </ul></td>
                        <td><p>High: the website is dedicated to bringing housing information to tenants; therefore, showing all listings and individual listing pages are the interaction points of tenants with the website.</p>
                <p>High: this feature is vital for tenants to quickly and conveniently search for suitable housing.</p></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td><p>Application for tenants to rent a property.</p>
                <ul>
                    <li>
                        <p>Tenants do not need an account to fill the form.</p>
                    </li>
                    <li>
                        <p>Tenants are required to provide identification and contact information.</p>
                    </li>
                </ul></td>
                        <td><p>Medium: This feature makes the application process quick and easy. However, many property managers expect tenants to visit and apply face-to-face.</p></td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td><p>Show reviews on listings.</p>
                <ul>
                    <li>
                        <p>Reviewers are required to leave contact information.</p>
                    </li>
                    <li>
                        <p>Show latest 1* and 5* reviews.</p>
                    </li>
                </ul></td>
                        <td><p>High: this allows tenants to avoid properties with bad practices. When a visitor sees a listing with good reviews, they may be inclined to check out the property manager.</p>
                <p>Medium: property managers may contact reviewers to resolve problems and ask them to take down reviews. However, reviewers&rsquo; contact information cannot be verified; thus, fake reviews may still occur.</p>
                <p>Low: Although this is useful to get updates on problematic or trustworthy landlords, tenants are more focused on other criterias (e.g. location or price) before reviews.</p></td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td><p>Host articles to educate inexperienced tenants or property managers.</p>
                <ul>
                    <li>
                        <p>Tenants may need a guide on balancing budgets, while new landlords would want to learn how to create a professional and useful property portfolio.</p>
                    </li>
                    <li>
                        <p>Articles may be submitted to the site by non-team members, written by our team, or reposted and credited from other sources by our team.</p>
                    </li>
                </ul></td>
                        <td>Medium: These articles are useful for our target demographic (inexperienced tenants in big cities). Nonetheless, hosting these articles may result in disputes with other parties (e.g. other platforms, or the author of the article may forget about allowing the article to be hosted).
                </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </main>
</body>
</html>
@endsection
