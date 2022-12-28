@extends('layouts.app')
@section('title', 'User info')
@section('content')
<body>
<div class="breadcrumb justify-content-center">
    <h2>{{ Breadcrumbs::render('breadcrumb_user', $user) }}</h2>
</div>
        <!-- <div>
            <h1>User</h1>
            <div>$user->id: {{ $user->id }}</div>
            <div>$user->user_description: {!!  nl2br(e($user->user_description)) !!}</div>
            <div>
                $blog->user->user_real_name:
                <button
                    onclick="window.location.href='{{ route('users.show', ['user' => $user]) }}';"
                    type="button"
                >
                    {{ $user->user_real_name }}
                </button>
            </div>
            <div>
                $user->user_image_path:
                <img
                    src="{{ asset('storage/images/').'/'.$user->user_image_path }}"
                    style="width:100px;height:100%;object-fit: cover;"
                >
            </div>
            <div>$user->user_password: {{ $user->user_password }}</div>
            <div>$user->user_phone_number: {{ $user->user_phone_number }}</div>
            <div>$user->user_email_address: {{ $user->user_email_address }}</div>
            <div>$user->created_at: {{ $user->created_at }}</div>
            <div>$user->created_at: {{ $user->updated_at }}</div>
        </div> -->

        <!-- <hr>

        <div>
            <h1>Listings</h1>
            @foreach($user->listings as $listing)
                <div {!! $listing->listing_available == 0 ? 'style="opacity: 0.4"' : 'style="opacity: 1"' !!}>
                    <div>
                        <h2>Listing</h2>
                        <div>$listing->id: {{ $listing->id }}</div>
                        <div>
                            $listing->listing_name:
                            <button
                                onclick="window.location.href='{{ route('listings.show', ['listing' => $listing]) }}';"
                                type="button"
                            >
                                {{ $listing->listing_name }}
                            </button>
                        </div>
                        <div>
                            $listing->listingimages:
                            @if($listing->listingimages->isEmpty())
                                <img
                                    src="https://via.placeholder.com/300.png/"
                                    width="100"
                                    height="100%"
                                >
                            @else
                                @foreach ($listing->listingimages as $listingimage)
                                    <img
                                        src="{{ asset('storage/images/').'/'.$listingimage->listing_image_path }}"
                                        width="100"
                                        height="100%"
                                    >
                                @endforeach
                            @endif
                        </div>
                        <div>$listing->listing_price: {{ number_format( (int) $listing->listing_price) }}</div>
                        <div>$listing->listing_available: {{ $listing->listing_available }}</div>
                    </div>

                    <div>
                        <h2>Special</h2>
                        <div>$listing->reviews_avg_review_rating: {{ (float) $listing->reviews_avg_review_rating }} stars from $listing->reviews_count: {{ (int) $listing->reviews_count }} reviews</div>
                        <div>$listing->applications_count: {{ (int) $listing->applications_count }} applications</div>
                    </div>
                </div>

                <br>
            @endforeach
        </div>

        <hr>

        <div>
            <h1>Blogs</h1>
            @foreach($user->blogs as $blog)
                <div>
                    <h2>Blog</h2>
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
                </div>

                <br>
            @endforeach
        </div> -->
        <div class="main-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="banner-dashboard mb-5">
                                <div class="card dashboard-account mx-auto">
                                    <div class="profile-pic-section mt-3">
                                        <div class="profile-pic-container">
                                            <img src="{{ asset('storage/images/').'/'.$user->user_image_path }}" style="height:100%;object-fit: cover;">    
                                        </div>
                                    </div>
                                    <div class="card-body text-center">
                                    <hr>
                                    <div class="card-name h3 mb-3">{{ $user->user_real_name }}</div>
                                    <p><i class="fa-solid fa-star"></i> <b>4.7</b> (32)</p>
                                    <p class="card-text">"{!!  nl2br(e($user->user_description)) !!}"</p>
                                    <br>
                                    <ul class="social-icons">
                                        <li><a class="icons" href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                        <li><a class="icons" href="https://github.com/VietNggRMIT/homie-g1"><i class="fa-brands fa-youtube"></i></a></li>  
                                    </ul>
                                        <div class="quick-info">
                                            <ul>
                                                <li><p><i class="fa-solid fa-address-card"></i> ID: {{ $user->id }}</p></li>
                                                <li><p><i class="fa-regular fa-compass"></i> Thanh Hoa, Viet Nam</p></li>
                                                <li><p><i class="fa-solid fa-mobile-screen"></i> Phone: {{ $user->user_phone_number }} </p></li>
                                                <li><p><i class="fa-regular fa-envelope"></i> Email: {{ $user->user_email_address }}</p></li>
                                                <li><p><i class="fa-regular fa-user"></i> Member since {{ $user->created_at }}</p></li>
                                                <li><p><i class="fa-sharp fa-solid fa-cake-candles"></i> D.O.B: 6/12/2000</p></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card mb-3">
                                <div class="dashboard-title">
                                    <div class="h2">Your property listings</div>
                                    <div>Description field, maybe this is updateable?</div>
                                </div>
                                <hr>
                                <div class="row">
                                @foreach($user->listings as $listing)
                                    <div class="col">
                                        <a class="card listing-card" href="{{ route('listings.show', ['listing' => $listing]) }}">
                                            <div id="carouselControls" class="carousel slide" data-bs-ride="false">
                                                <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="php1\resources\listing_image\1.jpg" class="d-block" alt="listing-img">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="php1\resources\listing_image\2.jpg" class="d-block" alt="listing-img">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="php1\resources\listing_image\3.jpg" class="d-block" alt="listing-img">
                                                </div>
                                                </div>
                                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselControls" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button" data-bs-target="#carouselControls" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $listing->listing_name }}</h5>
                                                <p class="mb-1">Posted by: {{ $user->user_real_name }}</p>
                                                <div class="card-listing-location d-flex mb-2">
                                                    <i class="fa-solid fa-location-dot"></i>
                                                    <p class="card-text">{{ $listing->listing_address_subdivision_1 }} </p>
                                                </div>
                                                <div class="card-description">
                                                    <p>{!!  nl2br(e($listing->listing_description)) !!}</p>
                                                </div>
                                                <div class="listing-amenities d-flex mb-3">
                                                    <div class="listing-feature">
                                                        <i class="fa-solid fa-users-between-lines"></i>
                                                        <span>{{ $listing->listing_specification_tenant }} person(s)</span>
                                                    </div>
                                                    <div class="listing-feature">
                                                        <i class="fa-solid fa-user-shield"></i>
                                                        <span>With owner</span>
                                                    </div>
                                                    <div class="listing-feature">
                                                        <i class="fa-solid fa-ruler-combined"></i>
                                                        <span>{{ $listing->listing_specification_size }} &#13217</span>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="card-price-rating d-flex">
                                                    <p class="card-text price">{{ number_format( (int) $listing->listing_price) }} vnd <span class="light-gray">/mo</span></p>
                                                    <div class="listing-rating">
                                                        <i class="fa-solid fa-star"></i>
                                                        <span>{{ (float) $listing->reviews_avg_review_rating }}</span>
                                                        <span class="sum-review light-gray">({{ (int) $listing->reviews_count }})</span>
                                                    </div>
                                                </div>  
                                            </div>
                                        </a>
                                    </div>
                        @endforeach    
                                <div class="show-more d-flex justify-content-center mb-3">
                                    <button class="btn btn-outline-primary">Show more</button>
                                    <button
                                        onclick="window.location.href='{{ route('listings.create', ['user' => $user->id]) }}';"
                                        type="button" class="btn btn-outline-primary"
                                    >
                                        Add a listing
                                    </button>
                                </div>
                            </div>
                        </div>
                            <div class="card mb-3">
                                <div class="dashboard-title">
                                    <div class="h3">Your blogposts</div>
                                </div>
                                <hr>
                                <div class="row row-cols-1 row-cols-md-2 g-4">
                                    @foreach($user->blogs as $blog)
                                        <div class="col">
                                            <a class="card listing-card blog-card" href="{{ route('blogs.show', ['blog' => $blog]) }}">
                                                <div class="card-body">
                                                    <h5 class="card-title">Blog by: {{ $blog->user->user_real_name }}</h5>
                                                    <p class="card-text">{{ $blog->blog_name }}</p>
                                                </div>
                                                <div class="card-footer">
                                                    <small class="text-muted">Last updated {{ date_diff(new \DateTime($blog->updated_at), new \DateTime(now()))->format("%m months, %d days, %h hours") }} ago</small>
                                                </div>
                                            </a>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="show-more d-flex justify-content-center mb-3">
                                        <button class="btn btn-outline-primary">Show more</button>
                                        <button
                                            onclick="window.location.href='{{ route('blogs.create', ['user' => $user->id]) }}';"
                                            type="button" class="btn btn-outline-primary"
                                        >
                                            Add a blog post
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
</body>
@endsection
</html>
