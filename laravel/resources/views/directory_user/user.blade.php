@extends('layouts.app')
@section('title', 'User'.' '.$user->user_real_name)
@section('content')

<div class="container">
    <div class="breadcrumb justify-content-center mt-5">
        <h2>{{ Breadcrumbs::render('breadcrumb_user', $user) }}</h2>
    </div>

    <div class="row">

        <div class="col-lg-4">
            <div class="banner-dashboard mb-5">
                <div class="card dashboard-account mx-auto">
                    <div class="profile-pic-section mt-3">
                        <div class="profile-pic-container">
                            <img class="card-img-top" src="{{ asset('storage/images/').'/'.$user->user_image_path }}" alt="Card image cap">
                        </div>
                    </div>
                    <div class="card-body text-center">
                    <hr>
                    <div class="card-name h3 mb-3">{{ $user->user_real_name }}</div>
                    <p>
                        <span class="text-muted">{{ count($user->listings) }} listings |</span>
                        <span class="text-muted">{{ count($user->blogs) }} blogs |</span>
                        <i class="fa-solid fa-star"></i>
                        <b>{{ round( (float) $user->reviews_avg_review_rating, 2) }}</b>
                        <span class="text-muted">({{ $user->reviews_count }}) |</span>
                        <i class="fa-solid fa-paper-plane purple-ice"></i>
                        <b>{{ $user->applications_count }}</b>
                    </p>
                    <p class="card-text">"{!!  nl2br(e($user->user_description)) !!}"</p>
                    <ul class="social-icons">
                        <li><a class="icons" href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a class="icons" href="https://github.com/VietNggRMIT/homie-g1"><i class="fa-brands fa-youtube"></i></a></li>
                    </ul>
                    <br>
                        <div class="quick-info">
                            <ul>
                                <li><p><i class="fa-solid fa-address-card"></i>ID: {{ $user->id }}</p></li>
                                <li><p><i class="fa-regular fa-compass"></i>Location: Binh Duong, Viet Nam</p></li>
                                <li><p><i class="fa-solid fa-mobile-screen"></i>Phone: {{ $user->user_phone_number }}</p></li>
                                <li><p><i class="fa-regular fa-envelope"></i>Email: {{ $user->user_email_address }}</p></li>
                                <li><p><i class="fa-regular fa-user"></i>Member since: {{ $user->created_at }}</p></li>
                                <li><p><i class="fa-solid fa-cake-candles"></i>Date of Birth: 6/12/2000</p></li>
                            </ul>
                        </div>
                        <hr>
                        @if(session('user'))
                            @if (session('user')->id == $user->id)
                                <div class="acc-options-btns d-grid gap-2 md-block">
                                    <a class="btn btn-warning" href="{{ route('users.edit', ['user' => $user]) }}">Update info</a>
                                    <a class="btn btn-warning" href="{{ route('login.edit', ['login' => $user]) }}">Change password</a>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card mb-3">
                <div class="dashboard-title">
                    <div class="h3 m-3 ms-4">Property Listings ({{ $user->listings_count }})</div>
                </div>
                <hr>
                <div class="row">

                    @foreach($user->listings as $listing)

                        <div class="col">
                            <a class="card listing-card" href="{{ route('listings.show', ['listing' => $listing]) }}">
                                <div id="carouselControls" class="carousel slide card-slider" data-bs-ride="false">
                                    <div class="carousel-inner">
                                        @if($listing->listingimages->isEmpty())
                                            <div class="carousel-item">
                                                <img src="https://via.placeholder.com/300.png/" class="d-block" alt="listing-img">
                                            </div>
                                        @else
                                            @foreach ($listing->listingimages->all() as $i)
                                                <div class="carousel-item">
                                                    <img src="{{ asset('storage/images/').'/'.$i->listing_image_path }}" class="d-block" alt="listing-img">
                                                </div>
                                            @endforeach
                                        @endif
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
                                        <p class="card-text">{{ $listing->listing_address_subdivision_1 }}</p>
                                    </div>
                                    <div class="card-description">
                                        <p>
                                            {!!  nl2br(e($listing->listing_description)) !!}
                                        </p>
                                    </div>
                                    <div class="listing-amenities d-flex mb-3">
                                        <div class="listing-feature">
                                            <i class="fa-solid fa-users-between-lines"></i>
                                            @if ($listing->listing_specification_tenant == 1)
                                                <span>{{ $listing->listing_specification_tenant }} person</span>
                                            @else
                                                <span>{{ $listing->listing_specification_tenant }} people</span>
                                            @endif
                                        </div>
                                        <div class="listing-feature">
                                            @if ($listing->listing_specification_owner == 1)
                                                <i class="fa-solid fa-user-shield"></i>
                                                <span>With owner</span>
                                            @else
                                                <i class="fa-solid fa-user-slash"></i>
                                                <span>Without owner</span>
                                            @endif
                                        </div>
                                        <div class="listing-feature">
                                            <i class="fa-solid fa-ruler-combined"></i>
                                            <span>{{ $listing->listing_specification_size }} m<sup>2</sup></span>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="card-price-rating d-flex">
                                        <p class="card-text price">{{ number_format( (int) $listing->listing_price) }} VND <span class="light-gray">/mo</span></p>
                                        <div class="listing-rating">
                                            <i class="fa-solid fa-star"></i>
                                            <span>{{ round( (float) $listing->reviews_avg_review_rating, 2) }}</span>
                                            <span class="sum-review light-gray">({{ (int) $listing->reviews_count }})</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                    @endforeach

                </div>
                <div class="show-more d-flex justify-content-center mb-3">
                    {{-- <button class="btn btn-outline-primary me-3">Show more</button> --}}
                    @if(session('user'))
                        @if (session('user')->id == $user->id)
                            <a class="btn btn-outline-primary" href="{{ route('listings.create', ['user' => $user->id]) }}">Create a listing</a>
                        @endif
                    @endif
                </div>
            </div>
            <div class="card mb-3">
                <div class="dashboard-title">
                    <div class="h3 m-3 ms-4">Blogs ({{ $user->blogs_count }})</div>
                </div>
                <hr>
                <div class="row row-cols-1 row-cols-md-2 g-4">

                    @foreach($user->blogs as $blog)
                        <div class="col">
                            <a class="card listing-card blog-card" href="{{ route('blogs.show', ['blog' => $blog]) }}">
                                <!-- <img src="php1\resources\background\tra-da-via-he-hanoi.jpg" class="card-img-top" alt="..."> -->
                                <div class="card-body">
                                    <h5 class="card-title">Blog by: {{ $blog->user->user_real_name }}</h5>
                                    <p class="card-text">{{ $blog->blog_name }}</p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">Last updated: {{ date_diff(new DateTime($blog->updated_at), new DateTime(now()))->format("%m months, %d days, %h hours") }} ago</small>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
                <div class="show-more d-flex justify-content-center my-3">
                    {{-- <button class="btn btn-outline-primary me-3">Show more</button> --}}
                    @if(session('user'))
                        @if (session('user')->id == $user->id)
                            <a class="btn btn-outline-primary" href="{{ route('blogs.create', ['user' => $user->id]) }}">Add a blog post</a>
                        @endif
                    @endif
                </div>
            </div>

        </div>

    </div>

</div>


@endsection

