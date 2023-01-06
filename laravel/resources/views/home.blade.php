@extends('layouts.app')
@section('title', 'Home')
@section('content')
@livewireStyles
                {{-- /*****************************************************************************
                The code below uses elements from:
                *Title: Counter JS
                *Author: srexi/purecounterjs on NPM
                *Availability: https://github.com/srexi/purecounterjs (Accessed 06 Jan 2023)
                *****************************************************************************/ --}}
<div class="container-fluid" id="banner-box-3">
    <div class="row justify-content-center">
        <div class="col" id="hero-box">
            {{-- OPTION 1 --}}
            <div>
                <h2>Welcome to Homie Rental</h2><br>

                There are <span data-purecounter-end="{{ $custom_count[0] }}" class="purecounter">0</span> property listings available
                (<span data-purecounter-end="{{ $custom_count[1] }}" class="purecounter">0</span> listing images,
                <span data-purecounter-end="{{ $custom_count[2] }}" class="purecounter">0</span> reviews,
                <span data-purecounter-end="{{ $custom_count[3] }}" class="purecounter">0</span> applications)<br>
                <span data-purecounter-end="{{ $custom_count[4] }}" class="purecounter">0</span> users to meet<br>
                <span data-purecounter-end="{{ $custom_count[5] }}" class="purecounter">0</span> blogs to read <br><br>
                <q class="quote"><i>Renting easy like renting from your homie</i></q> - Founder
            </div>

            {{-- OPTION 2 --}}
{{--            <h1>Welcome to Homie Rental</h1>--}}
{{--            <h4><span data-purecounter-end="{{ $custom_count[0] }}" class="purecounter">0</span><span class="text-secondary text-opacity-50"> listings available</span></h4>--}}
{{--            <div class="d-flex justify-content-center">--}}
{{--                (<h5><span data-purecounter-end="{{ $custom_count[1] }}" class="purecounter">0</span><span class="text-secondary text-opacity-50"> listings images</span></h5>--}}
{{--                <h5 class="mx-3"><span data-purecounter-end="{{ $custom_count[2] }}" class="purecounter">0</span><span class="text-secondary text-opacity-50"> reviews</span></h5>--}}
{{--                <h5><span data-purecounter-end="{{ $custom_count[3] }}" class="purecounter">0</span><span class="text-secondary text-opacity-50"> applications</span></h5>)--}}
{{--            </div>--}}
{{--            <h4><span data-purecounter-end="{{ $custom_count[4] }}" class="purecounter">0</span><span class="text-secondary text-opacity-50"> users to meet</span></h4>--}}
{{--            <h4><span data-purecounter-end="{{ $custom_count[5] }}" class="purecounter">0</span><span class="text-secondary text-opacity-50"> blogs to read</span></h4>--}}
{{--            <q><i>Renting easy like renting from your homie</i></q><span>- Founder</span>--}}
        </div>
    </div>
</div>

<div class="container">

    <div class="filter-img-section mt-5">

        <div class="filter-img text-center">
            <h2 class="mb-5">Let's choose a city to begin!</h2>

            @livewire('live-search')

            <div class='row my-5'>
                <div class='col-sm-6'>
                    <a href="/listings?searchAddress=Ho Chi Minh"><img src="{{ asset('storage/images/filter-img/hcmc-listing.png')}}" alt="HCM"></a>
                </div>
                <div class='col-sm-3'>
                    <div class="top-img-box">
                        <a href="/listings?searchAddress=Ha Noi"><img src="{{ asset('storage/images/filter-img/hn-listing.png')}}" alt="HN"></a><br>
                    </div>
                    <div class="under-img-box">
                        <a href="/listings?searchAddress=Binh Duong"><img src="{{ asset('storage/images/filter-img/BD-listing.png')}}" alt="BD"></a>
                    </div>
                </div>
                <div class='col-sm-3'>
                    <div class="top-img-box">
                        <a class="smooth-transition" href="/listings?searchAddress=Dong Nai"><img src="{{ asset('storage/images/filter-img/DDN-listing.png')}}" alt="DDN"></a><br>
                    </div>
                    <div class="under-img-box">
                        <a href="/listings?searchAddress=Da Nang"><img src="{{ asset('storage/images/filter-img/DNA-listing.png')}}" alt="DNA"></a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="mb-3">
        <hr>
        <div class="d-flex justify-content-between align-items-center">
            <h1>Property Listings ({{ $custom_count[0] }})</h1>
            <button onclick="window.location.href='{{ route('listings.index') }}';" type="button" class="custom-btn btn-1">
                See more
            </button>
        </div>
        <hr class="baby">
    </div>

    <div class="row row-cols-lg-3">

        @foreach ($listings as $listing)
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

    <div class="mb-3">
        <hr>
        <div class="l-blogheader d-flex justify-content-between align-items-center">
            <h1>Blogs ({{ $custom_count[5] }})</h1>
            <button onclick="window.location.href='{{ route('blogs.index') }}';" type="button" class="custom-btn btn-1">
                See more
            </button>
        </div>
        <hr class="baby">
    </div>

    <div class="blog-listing-section mb-5">
        @foreach ($blogs as $blog)

            <div class="card blog-card gy-3 px-3 py-2 mb-1 smooth-transition">
                <div class="row align-items-center">

                    {{-- Left Col --}}
                    <div class="col-md-8">
                        <div class="row">
                            <a class="card-title h5 mt-2 mb-3 smooth-transition" href="{{ route('blogs.show', ['blog' => $blog]) }}">
                                {{ $blog->blog_name }}
                            </a>
                        </div>
                        <div class="row">
                            <p>
                                <i class="fa-solid fa-hashtag purple-ice"></i>
                                {{ $blog->id }}
                                <i class="fa-solid fa-calendar-days"></i>
                                <span data-toggle="tooltip" data-placement="top" title="{{ $blog->created_at }}">
                                    Posted {{ $blog->created_at->diffForHumans(['parts' => 3, 'join' => ', ', 'short' => false]) }}
                                </span>
                            </p>
                        </div>
                    </div>

                    {{-- Right Col --}}
                    <div class="col-md-4">
                        <div class="row">
                            <p>
                                <i class="fa-regular fa-id-card"></i>
                                <a class="user-name smooth-transition" href="{{ route('users.show', ['user' => $blog->user]) }}">{{ $blog->user->user_real_name }}</a>
{{--                                        <i class="fa-solid fa-hashtag purple-ice"></i>--}}
{{--                                        {{ $blog->user->id }}--}}
                            </p>
                        </div>
                        <div class="row">
                            <p class="text-secondary text-opacity-25" data-toggle="tooltip" data-placement="top" title="{{ $blog->updated_at }}">
                                Last updated {{ $blog->updated_at->diffForHumans(['parts' => 3, 'join' => ', ', 'short' => false]) }}
                            </p>
                        </div>
                    </div>

                </div>
            </div>

        @endforeach
    </div>

</div>
@livewireScripts
@endsection
