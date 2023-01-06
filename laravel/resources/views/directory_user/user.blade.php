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
                        <div class="d-flex justify-content-center">
                            <img class="img-fluid rounded-4 card-img-top" src="{{ asset('storage/images/').'/'.$user->user_image_path }}" alt="profile image">
                        </div>
                    </div>
                    <div class="card-body text-center">
                    <hr>
                    <div class="card-name h3 mb-3">{{ $user->user_real_name }}</div>
                    <p>
                        <span class="text-muted">{{ count($user->listings) }} property listings |</span>
                        <span class="text-muted">{{ count($user->blogs) }} blogs |</span>
                        <i class="fa-solid fa-star"></i>
                        <b>{{ round( (float) $user->reviews->avg('review_rating'), 2) }}</b>
                        <span class="text-muted">({{ count($user->reviews) }}) |</span>
                        <i class="fa-solid fa-paper-plane purple-ice"></i>
                        <b>{{ count($user->applications) }}</b>
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
                                <li><p>
                                    <i class="fa-regular fa-user"></i>
                                    <span data-toggle="tooltip" data-placement="top" title="{{ $user->created_at }}">
                                        Member for {{ $user->created_at->diffForHumans(now(), Carbon\CarbonInterface::DIFF_ABSOLUTE, false, 3) }}
                                    </span>
                                </p></li>
                                <li><p><i class="fa-solid fa-cake-candles"></i>Date of Birth: 6/12/2000</p></li>
                            </ul>
                        </div>
                        <hr>
                        {{-- /*****************************************************************************
                        The code below uses elements from:
                        *Title: Database: Routing
                        *Author: Laravel
                        *Code version: 9.x
                        *Availability: https://laravel.com/docs/9.x/routing (Accessed 5 November 2022)
                        *****************************************************************************/ --}}
                        <div class="acc-options-btns d-grid gap-2 md-block">
                            @if(session('user'))
                                @if (session('user')->id == $user->id)
                                    <a class="btn btn-warning" href="{{ route('users.edit', ['user' => $user]) }}">Update info</a>
                                    <a class="btn btn-warning" href="{{ route('login.edit', ['login' => $user]) }}">Change password</a>
                                @else
                                    <a href="tel:{{ $user->user_phone_number }}" class="btn btn-warning">Call {{ $user->user_phone_number }}</a>
                                    <a href="tel:{{ $user->user_email_address }}" class="btn btn-warning">Email {{ $user->user_email_address }}</a>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">

            {{-- Part 3. Listings --}}
            <div class="card mb-3">
                <div class="dashboard-title">
                    <div class="h3 m-3 ms-4">Property Listings ({{ count($user->listings) }})</div>
                </div>
                <hr>
                <div class="row">

                    @foreach($user->listings as $listing)

                        <div class="col">
                            <a class="card listing-card" href="{{ route('listings.show', ['listing' => $listing]) }}">

                                {{-- Part 1. Top Card --}}
                                <div id="carouselID{{ $loop->index }}" class="carousel slide carousel-dark" data-bs-ride="true">

                                    {{-- Part 1.1. Indicators --}}
                                    @if (count($listing->listingimages) >= 2)
                                        <div class="carousel-indicators">
                                            @foreach ($listing->listingimages as $listingimage)
                                                @if ($loop->first)
                                                    <button type="button" data-bs-target="#carouselID{{ $loop->index }}" data-bs-slide-to="{{ $loop->index }}" class="active" aria-current="true" aria-label="Slide {{ $loop->index }}"></button>
                                                @else
                                                    <button type="button" data-bs-target="#carouselID{{ $loop->index }}" data-bs-slide-to="{{ $loop->index }}" aria-label="Slide {{ $loop->index }}"></button>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif

                                    {{-- Part 1.2. Images --}}
                                    <div class="carousel-inner">
                                        @if ($listing->listingimages->isEmpty())
                                            <div class="carousel-item active opacity-25">
                                                <img src="{{ asset('storage/images/listing_image_path_default.png')}}" class="d-block rounded-4" style="max-height: 100%; min-height: 100%; object-fit: contain">
                                            </div>
                                        @else
                                            @foreach ($listing->listingimages as $listingimage)
                                                <div @if ($loop->first) class="carousel-item active" @else class="carousel-item" @endif>
                                                    {{-- img tag old class: class="d-block w-100 rounded-4" --}}
                                                    <img src="{{ asset('storage/images').'/'.$listingimage->listing_image_path }}" class="d-block rounded-4" style="max-height: 100%; min-height: 100%; object-fit: contain">
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>

                                    {{-- Part 1.3. Buttons --}}
                                    @if (count($listing->listingimages) >= 2)
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselID{{ $loop->index }}" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselID{{ $loop->index }}" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    @endif
                                </div>

                                {{-- Part 2. Middle Card --}}
                                <div class="card-body">
                                    <h5 class="card-title">{{ $listing->listing_name }}</h5>
                                    <p class="text-secondary text-opacity-25 mb-1 text-truncate">Posted by {{ $listing->user->user_real_name }}</p>
            {{--                        <p class="mb-1" onclick="window.location.href='{{ route('users.show', ['user' => $listing->user]) }}';">Posted by {{ $listing->user->user_real_name }}</p>--}}
                                    <div class="card-listing-location d-flex mb-2">
                                        <i class="fa-solid fa-location-dot"></i>
                                        <p class="card-text">{{ $listing->listing_address_subdivision_1 }}</p>
                                    </div>
                                    <div class="card-description">
                                        <p>
                                            {!!  nl2br(e($listing->listing_description)) !!}
                                        </p>
                                    </div>
                                    <div class="listing-amenities d-flex my-3">
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
                                            <span>{{ (int) $listing->listing_specification_size }} m<sup>2</sup></span>
                                        </div>
                                    </div>
                                    <hr>

                                    {{-- Part 2.1. Listing Price, Application, Review --}}
                                    <div class="card-price-rating d-flex">
                                        <p class="card-text price">{{ number_format( (int) $listing->listing_price) }} VND<span class="text-secondary text-opacity-25">/mo</span></p>
                                        <div class="d-flex justify-content-end">
                                            <div class="pe-2">
                                                <i class="fa-solid fa-paper-plane purple-ice"></i>
                                                <span>{{ count($listing->applications) }}</span>
                                            </div>
                                            <div class="listing-rating">
                                                <i class="fa-solid fa-star"></i>
                                                <span>{{ round( (float) $listing->reviews->avg('review_rating'), 2) }}</span>
                                                <span class="sum-review text-secondary text-opacity-25">({{ count($listing->reviews) }})</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Part 3. Bottom Card --}}
                                <div class="card-footer">
                                    <small class="text-secondary text-opacity-25" data-toggle="tooltip" data-placement="top" title="{{ $listing->updated_at }}">
                                        Last updated {{ $listing->updated_at->diffForHumans(['parts' => 3, 'join' => ', ', 'short' => false]) }}
                                    </small>
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

            {{-- Part 2. Blogs --}}
            <div class="card mb-3">
                <div class="dashboard-title">
                    <div class="h3 m-3 ms-4">Blogs ({{ count($user->blogs) }})</div>
                </div>
                <hr>
                <div class="row row-cols-1 row-cols-md-2 g-4">

                    @foreach($user->blogs as $blog)
                        <div class="col">
                            <a class="card listing-card blog-card" href="{{ route('blogs.show', ['blog' => $blog]) }}">
                                <!-- <img src="php1\resources\background\tra-da-via-he-hanoi.jpg" class="card-img-top" alt="..."> -->
                                <div class="card-body">
                                    <h5 class="card-title">Blog by {{ $blog->user->user_real_name }}</h5>
                                    <p class="card-text">{{ $blog->blog_name }}</p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted" data-toggle="tooltip" data-placement="top" title="{{ $blog->updated_at }}">
                                        Last updated {{ $blog->updated_at->diffForHumans(['parts' => 3, 'join' => ', ', 'short' => false]) }}
                                    </small>
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

            {{-- Part 3. Applications --}}
            <div class="card mb-3">
                <div class="dashboard-title">
                    <div class="h3 m-3 ms-4">Property Applications ({{ count($user->applications) }})</div>
                </div>
                <hr>
                <div class="row row-cols-1 row-cols-md-2 g-4">

                    @foreach($user->applications as $application)
                        <div class="col">
                            <a class="card listing-card blog-card">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="fa-solid fa-hashtag purple-ice"></i> Application number {{ $application->id }}</h5>
                                    <p class="card-text">{!! nl2br(e($application->application_description)) !!}</p>
                                </div>
                                <div class="card-footer d-flex justify-content-between align-items-center">
                                    <small class="text-secondary text-opacity-25" data-toggle="tooltip" data-placement="top" title="{{ $application->created_at }}">
                                        Applied {{ $application->created_at->diffForHumans(['parts' => 3, 'join' => ', ', 'short' => false]) }}
                                    </small>
                                    <form method="POST" action="{{ route('applications.destroy', ['application' => $application]) }}" name="deleteApplicationForm">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger btn-sm" type="submit" onClick="envio2(event)">Delete</button>
                                    </form>
                                </div>
                            </a>
                        </div>
                        @if ($loop->index == 6)
                            @break
                        @endif
                    @endforeach

                </div>

            </div>

        </div>

    </div>

</div>


@endsection

