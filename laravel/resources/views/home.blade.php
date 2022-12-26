@extends('layouts.app')
@section('title', 'Home')
@section('content')

<div class="container-fluid" id="banner-box-3">
    <div class="row justify-content-center">
        <div class="col" id="hero-box">
            <p><h2>Welcome to Homie Rental</h2><br>
            <span data-purecounter-end="{{ $custom_count[0] }}" class="purecounter">0</span> listings available
            (<span data-purecounter-end="{{ $custom_count[1] }}" class="purecounter">0</span> listing images,
            <span data-purecounter-end="{{ $custom_count[2] }}" class="purecounter">0</span> reviews,
            <span data-purecounter-end="{{ $custom_count[3] }}" class="purecounter">0</span> applications)<br>
            Site has <span data-purecounter-end="{{ $custom_count[4] }}" class="purecounter">0</span> users online.<br>
            There are <span data-purecounter-end="{{ $custom_count[5] }}" class="purecounter">0</span> blogs to read. <br><br>
            <q class="quote"><i>Renting easy like renting from your homie</i></q> - Founder                  
            </p>
        </div>
    </div>
</div>

<div class="container">

    <div class="filter-img-section">
        <div class="filter-img text-center">
            <h2>Choose a city you want to start at</h2>
            <div class='row mb-5'> 
                <div class='col-sm-6'>
                    <a href=""><img src="{{ asset('storage/images/filter-img/hcmc-listing.png')}}" alt="HCM"></a>
                </div>
                <div class='col-sm-3'>
                    <div class="top-img-box">
                        <a href=""><img src="{{ asset('storage/images/filter-img/hn-listing.png')}}" alt="HN"></a><br>
                    </div>
                    <div class="under-img-box">
                        <a href=""><img src="{{ asset('storage/images/filter-img/BD-listing.png')}}" alt="BD"></a>        
                    </div>
                </div>
                <div class='col-sm-3'>
                    <div class="top-img-box">
                        <a class="smooth-transition" href=""><img src="{{ asset('storage/images/filter-img/DDN-listing.png')}}" alt="DDN"></a><br>
                    </div>
                    <div class="under-img-box">
                        <a href=""><img src="{{ asset('storage/images/filter-img/DNA-listing.png')}}" alt="DNA"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <hr>
        <div class="d-flex justify-content-between align-items-center">
            <h1>Listings</h1>
            <button onclick="window.location.href='{{ route('listings.index') }}';" type="button" class="custom-btn btn-1">
                See more 
            </button>
        </div>
    </div>

    <div class="row row-cols-lg-3">

        @foreach ($listings as $listing)
            <div class="col">
                <a class="card listing-card" onclick ="window.location='{{ route('listings.show', ['listing' => $listing]) }}';">
                    <div id="carouselControls" class="carousel slide card-slider" data-bs-ride="false">
                        <div class="carousel-inner">
                            @if($listing->listingimages->isEmpty())
                                <div class="carousel-item active">
                                    <img src="https://via.placeholder.com/300.png/" class="d-block" alt="listing-img">
                                </div>
                                
                            @else
                                <div class="carousel-item active">
                                    <img src="{{ asset('storage/images/').'/'.$listing->listingimages->first()->listing_image_path }}" class="d-block" alt="listing-img">
                                </div>
                            @endif
                            <!-- <div class="carousel-item active">
                                <img src="php1\resources\listing_image\1.jpg" class="d-block" alt="listing-img">
                            </div>
                            <div class="carousel-item">
                                <img src="php1\resources\listing_image\2.jpg" class="d-block" alt="listing-img">
                            </div>
                            <div class="carousel-item">
                                <img src="php1\resources\listing_image\3.jpg" class="d-block" alt="listing-img">
                            </div> -->
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
                        <p class="mb-1">Posted by: {{ $listing->user->user_real_name }}</p>
                        <div class="card-listing-location d-flex mb-2">
                            <i class="fa-solid fa-location-dot"></i>
                            <p class="card-text">{{ $listing->listing_address_subdivision_1 }}</p>
                        </div>
                        <!-- <div class="card-description" style="min-height: 4rem;">
                            <p>
                                {{ $listing->listing_description }}
                            </p>
                        </div> -->
                        <div class="listing-amenities d-flex my-3">
                            <div class="listing-feature">
                                <i class="fa-solid fa-users-between-lines"></i>
                                <span>{{ (int) $listing->listing_specification_tenant }} person(s)</span>
                            </div>
                            <div class="listing-feature">
                                <i class="fa-solid fa-user-shield"></i>
                                <span>With owner</span>
                            </div>
                            <div class="listing-feature">
                                <i class="fa-solid fa-ruler-combined"></i>
                                <span>{{ (int) $listing->listing_specification_size }} &#13217</span>
                            </div>
                        </div>
                        <hr>
                        <div class="card-price-rating d-flex">
                            <p class="card-text price">{{ number_format( (int) $listing->listing_price) }} VND<span class="light-gray">/mo</span></p>
                            <!-- <div><i class="fa-solid fa-paper-plane"></i> {{ (int) $listing->applications_count }}</div> -->
                            <div class="listing-rating">
                                <i class="fa-solid fa-star"></i>
                                <span>{{ (float) $listing->reviews_avg_review_rating }}</span>
                                <span class="sum-review light-gray">({{ (int) $listing->reviews_count }})</span>
                            </div>
                        </div>  
                    </div>
                    <div class="card-footer">
                        <small class="text-muted" data-toggle="tooltip" data-placement="top" title="{{ $listing->updated_at }}">
                            Last updated: {{ date_diff(new \DateTime($listing->updated_at), new \DateTime(now()))->format("%m months, %d days, %h hours") }} ago
                        </small>
                    </div>
                </a>
            </div>
        @endforeach

    </div>

    <div class="row">
        <hr>
        <div class="l-blogheader d-flex justify-content-between align-items-center mb-3">
            <h1>Blogs</h1>
            <button onclick="window.location.href='{{ route('blogs.index') }}';" type="button" class="custom-btn btn-1">
                See more 
            </button>
        </div>
    </div>

    <div class="blog-listing-section">
        @foreach ($blogs as $blog)

            <div class="card blog-card gy-3 px-3 py-2 mb-1 smooth-transition">
                <div class="row align-items-center">

                    <div class="col-md-8">
                        <div class="row">
                            <a class="card-title h5 mb-3 smooth-transition" href="{{ route('blogs.show', ['blog' => $blog]) }}">
                                {{ $blog->blog_name }}
                            </a>
                        </div>
                        <div class="row">
                            <p>
                                <i class="fa-solid fa-calendar-days"></i>
                                {{ date_diff(new \DateTime($listing->updated_at), new \DateTime(now()))->format("%m months, %d days, %h hours") }} ago
                                <i class="fa-solid fa-hashtag"></i>
                                {{ $blog->id }}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <p>
                                <i class="fa-regular fa-id-card"></i>
                                <a class="user-name smooth-transition" href="{{ route('users.show', ['user' => $blog->user]) }}">{{ $blog->user->user_real_name }}</a>
                                <i class="fa-solid fa-hashtag"></i>
                                {{ $blog->user->id }}
                            </p>
                        </div>
                        <div class="row">
                            <p><b>Updated at:</b> {{ $blog->updated_at }}</p>
                        </div>
                    </div>
                    
                </div>
            </div>

        @endforeach    
    </div>

</div>
@endsection
