@extends('layouts.app')
@section('title', 'Listing'.' '.$listing->listing_name)
@section('content')

    <div class="container">

        @if(session('listing_success_store'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                <span>Saved property listing <b>{{ $listing->listing_name }}</b> to the database!</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session('listing_success_update'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                <span>Updated property listing <b>{{ $listing->listing_name }}</b> to the database!</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session('application_success_store'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                <span>You successfully applied to the property listing <b>{{ $listing->listing_name }}</b>!</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session('review_success_store'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                <span>You successfully reviewed to the property listing <b>{{ $listing->listing_name }}</b>!</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session('application_success_destroy'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                <span>You deleted an application</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card listing-card responsive-listings-bigger mt-3">
            {{-- Part 1. Top Card --}}
            <div id="carouselID9999" class="carousel slide carousel-dark" data-bs-ride="true">

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
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselID9999" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselID9999" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                @endif
            </div>
        </div>

        <!-- <button
            onclick="window.location.href='{{ route('listings.edit', ['listing' => $listing]) }}';"
            type="button"
        >
            Edit this listing
        </button> -->
        <!-- <form method="POST" action="{{ url("delete-listing/{$listing->id}") }}">
            @csrf
            <button type="submit">Delete this listing</button>
        </form> -->
        <!-- <button
            onclick="window.location.href='{{ route('reviews.create', ['listing' => $listing->id]) }}';"
            type="button"
        >
            Add a review to this listing
        </button> -->
        <!-- <button
            onclick="window.location.href='{{ route('applications.create', ['listing' => $listing->id]) }}';"
            type="button"
        >
            Submit an application to this listing
        </button> -->

        <div class="breadcrumb justify-content-center mt-3">
            <h2>{{ Breadcrumbs::render('breadcrumb_listing', $listing) }}</h2>
        </div>

        <div class="row listing-description mt-3">
            <div class="col col-xl-7">

                <div class="card listing-details">

                    <div class="card-body">
                        {{-- 1. Listing Name --}}
                        <div class="card-title h1">{{ $listing->listing_name }}</div>
                        {{-- 2. Listing ID, and Created Date --}}
{{--                        <div>--}}
{{--                            <i class="fa-solid fa-hashtag purple-ice"></i>--}}
{{--                            <span class="text-secondary text-opacity-25">{{ $listing->id }}</span>--}}
{{--                            <span class="h6 mb-2 text-secondary text-opacity-25">--}}
{{--                                <a href="{{ route('users.show', ['user' => $listing->user]) }}">{{ $listing->user->user_real_name }}</a>--}}
{{--                                <span>on</span>--}}
{{--                                <span>{{ $listing->created_at }}</span>--}}
{{--                            </span>--}}
{{--                        </div>--}}
                        <hr class="baby">
                        {{-- 3. Listing Location --}}
                        <div class="card-listing-location d-flex align-items-center mb-3">
                            <i class="fa-solid fa-location-dot me-2"></i>
                            <p class="card-text">
                                {{ $listing->listing_address_subdivision_1.' '.$listing->listing_address_subdivision_2.' '.$listing->listing_address_subdivision_3 }}
                            </p>
                        </div>

                        {{-- 4. Listing Description --}}
                        <div class="h5">Description</div>
                        <div class="card-description specific">
                            @if (empty($listing->listing_description))
                                <p class="pb-5">
                                    <span class="text-secondary text-opacity-25">Empty</span>
                                    {!!  nl2br(e($listing->listing_description)) !!}
                                </p>
                            @else
                                <p>
                                    {!!  nl2br(e($listing->listing_description)) !!}
                                </p>
                            @endif
                        </div>

                        {{-- 5. Edit & Delete Buttons --}}
                        @if(session('user'))
                            @if (session('user')->id == $listing->user->id)
                                <div class="listing-modifications d-flex justify-content-end mt-3">
                                    <div>
                                        <a class="btn btn-outline-secondary" href="{{ route('listings.edit', ['listing' => $listing]) }}">Edit</a>
                                    </div>
                                    <form class="ms-3" method="POST" action="{{ url("delete-listing/{$listing->id}") }}" name="deleteListingForm">
                                        @csrf
                                        <button class="btn btn-outline-danger" type="submit" onClick="return confirm('Delete property listing name {{ $listing->listing_name }}. Are you sure?')">Delete</button>
                                    </form>
                                </div>
                            @endif
                        @endif

                    </div>

                    {{-- 6. Updated Date --}}
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <small class="text-secondary text-opacity-25" data-toggle="tooltip" data-placement="top" title="{{ $listing->created_at }}">
                                Posted {{ $listing->created_at->diffForHumans(['parts' => 3, 'join' => ', ', 'short' => false]) }}
                            </small>
                            <small class="text-secondary text-opacity-25" data-toggle="tooltip" data-placement="top" title="{{ $listing->updated_at }}">
                                Last updated {{ $listing->updated_at->diffForHumans(['parts' => 3, 'join' => ', ', 'short' => false]) }}
                            </small>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col col-xl-5">

                <div class="card listing-amenities-ratings">

                    <div class="card-body">
                        <div class="title mb-3">
                            <div class="h3">Listing Amenities</div>
                        </div>
                        <hr class="baby">
                        <div class="row listing-amenities align-items-center justify-content-around text-center gy-3 mb-3">

                            {{-- 1. Tenant --}}
                            <div class="col listing-feature" id="spec_tenant">
                                <i class="fa-solid fa-users-between-lines"></i>
                                @if ($listing->listing_specification_tenant == 1)
                                    <span>{{ $listing->listing_specification_tenant }} person</span>
                                @else
                                    <span>{{ $listing->listing_specification_tenant }} people</span>
                                @endif
                            </div>

                            {{-- 2. Live with Owner --}}
                            <div class="col listing-feature" id="spec_owner">
                                @if ($listing->listing_specification_owner == 1)
                                    <i class="fa-solid fa-user-shield"></i>
                                    <span>With owner</span>
                                @else
                                    <i class="fa-solid fa-user-slash"></i>
                                    <span>Without owner</span>
                                @endif
                            </div>

                            {{-- 3. Size --}}
                            <div class="col listing-feature" id="spec_size">
                                <i class="fa-solid fa-ruler-combined"></i>
                                <span>{{ $listing->listing_specification_size }} m<sup>2</sup></span>
                            </div>

                            {{-- 4. Bedroom --}}
                            <div class="col listing-feature" id="spec_bed">
                                <i class="fa-solid fa-bed"></i>
                                @if ($listing->listing_specification_bedroom == 1)
                                    <span>{{ $listing->listing_specification_bedroom }} bed</span>
                                @else
                                    <span>{{ $listing->listing_specification_bedroom }} beds</span>
                                @endif
                            </div>

                            {{-- 5. Bathroom --}}
                            <div class="col listing-feature" id="spec_bath">
                                <i class="fa-solid fa-shower"></i>
                                @if ($listing->listing_specification_bathroom == 1)
                                    <span>{{ $listing->listing_specification_bathroom }} bathroom</span>
                                @else
                                    <span>{{ $listing->listing_specification_bathroom }} bathrooms</span>
                                @endif
                            </div>

                            {{-- 6. Avilable --}}
                            <div class="col listing-feature" id="spec_available">
                                @if ($listing->listing_available == 1)
                                    <i class="fa-solid fa-handshake"></i>
                                    <span>Available for Rent</span>
                                @else
                                    <i class="fa-solid fa-handshake-slash"></i>
                                    <span>Not for Rent</span>
                                @endif
                            </div>

                        </div> {{-- close 6 amenities div tag --}}
                        <hr>
                        <div class="card-price-rating d-flex justify-content-between">
                            <div class="card-text price mb-0"><strong>{{ number_format( (int) $listing->listing_price) }} VND</strong><span class="text-secondary text-opacity-25">/month</span></div>
                            <div class="listing-rating">
                                <i class="fa-solid fa-star"></i>
                                <span>{{ round( (float) $listing->reviews_avg_review_rating, 2) }}</span>
                                <span class="sum-review text-secondary text-opacity-25">({{ (int) $listing->reviews_count }})</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="h5 text-center mt-1">
                            <i class="fa-solid fa-paper-plane purple-ice me-3"></i>{{ (int) $listing->applications_count }}
                            @if($listing->applications_count == 1)
                                application submitted
                            @else
                                applications submitted
                            @endif
                        </div>
                        <div class="btn-container my-3">
                            @if ($listing->listing_available == 1)
                                <a class="btn btn-warning btn-lg px-5" href="{{ route('applications.create', ['listing' => $listing->id]) }}">Apply Now! ????</a>
                            @else
                                <a class="btn btn-secondary btn-lg px-5 disabled text-decoration-line-through" href="{{ route('applications.create', ['listing' => $listing->id]) }}">Not Available ????</a>
                            @endif
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <div class="row listing-owner-map mt-5">
            <div class="col col-lg-7">
                <div class="card p-3">
                    <div class="title mt-3">
                        <div class="h2">Property Owner</div>
                        <hr class="baby">
                    </div>
                    <div class="row gx-4">
                        <div class="col col-lg-7 gy-2">
                            <div class="col d-flex align-items-center mb-3">
                                <div class="profile-pic-section me-3">
                                    <div class="profile-pic-container listing-details">
                                        <img class="card-img-top" src="{{ asset('storage/images/').'/'.$listing->user->user_image_path }}" alt="Card image cap">
                                    </div>
                                </div>
                                <div class="owner-info">
                                    <a href="{{ route('users.show', ['user' => $listing->user]) }}" class="text-decoration-none text-dark">
                                        <div class="h3">{{ $listing->user->user_real_name }}</div>
                                    </a>
                                    <div class="listing-rating">
                                        {{-- Star --}} <i class="fa-solid fa-star"></i>
                                        {{-- AVG --}} <span>{{ round( (float) $custom_user->reviews_avg_review_rating, 2) }}</span>
                                        {{-- COUNT --}} <span class="sum-review text-secondary text-opacity-25">({{ $custom_user->reviews_count }}) |</span>
                                        {{-- Paper Plane --}} <i class="fa-solid fa-paper-plane purple-ice"></i>
                                        {{-- COUNT --}} {{ $custom_user->applications_count }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="user-description">
                                    <p>
                                        {{ $listing->user->user_description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col col-lg-5">
                            <div class="quick-info my-auto">
                                <ul class="icons-list ls-none align-items-center text-end px-0">
                                    <li><p>ID: {{ $listing->user->id }} <i class="fa-solid fa-address-card"></i></p></li>
                                    <li><p>Viet Nam <i class="fa-regular fa-compass"></i></p></li>
                                    <li><p>{{ $listing->user->user_phone_number }} <i class="fa-solid fa-mobile-screen"></i></p></li>
                                    <li><p>{{ $listing->user->user_email_address }} <i class="fa-regular fa-envelope"></i></p></li>
                                    <li><p>
                                        <span data-toggle="tooltip" data-placement="top" title="{{ $listing->user->created_at }}">
                                            Member for {{ $listing->user->created_at->diffForHumans(now(), Carbon\CarbonInterface::DIFF_ABSOLUTE, false, 3) }}
                                        </span>
                                        <i class="fa-regular fa-user"></i>
                                        </p></li>
                                    <li><p>Date of Birth: 6/12/2000 <i class="fa-sharp fa-solid fa-cake-candles"></i></p></li>
                                </ul>
                            </div>
                        </div>
                        <div class="mt-3 mx-auto">
                            <a href="tel:{{ $listing->user->user_phone_number }}" class="btn btn-outline-warning mb-3">Call</a>
                            <a href="mailto:{{ $listing->user->user_email_address }}" class="btn btn-outline-warning mb-3">Email</a>
                            <a href="{{ route('users.show', ['user' => $listing->user]) }}" class="btn btn-warning mb-3">View Profile</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col col-lg-5 embed-map">
                <div class="card listing-map px-3 py-3">
                    <div class="title mt-3">
                        <div class="h2">Google Maps Location</div>
                        <hr class="baby">
                    </div>
                    <div>
                        <iframe
                            width="100%"
                            height="400"
                            style="border:0"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                            src="https://maps.google.com/maps?q={{$listing->listing_address_latitude.",".$listing->listing_address_longitude}}&amp;t=&amp;z=12&amp;iwloc=B&amp;output=embed">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>

        <div class="row listing-reviews my-5">
            <div class="col col-lg-7">
                <div class="card px-3 py-3">
                    <div class="title mt-3">
                        <div class="h3">Property Reviews ({{ (int) $listing->reviews_count }})</div>
                        <hr class="baby">
                    </div>

                    <div>
                        @if($listing->reviews->isEmpty())
                            <div class="row review-block mb-5">
                                <div class="col-lg-2">
                                    <div class="profile-pic-section">
                                        <div class="profile-pic-container listing-details">
                                            <img
                                                class="card-img-top"
                                                alt="person"
                                                src="{{asset('storage/images/user_image_path.jpg')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-10">
                                    <div class="d-flex justify-content-between mb-1">
                                        <div class="d-flex flex-column">
                                            <div class="p">&nbsp;</div>
                                            <small class="text-secondary text-opacity-25" data-toggle="tooltip" data-placement="top" title="&nbsp;">
                                                &nbsp;
                                            </small>
                                        </div>
                                        <div class="d-flex">

                                        </div>
                                    </div>
                                    <div class="review-comments h6">
                                        Be the first to review this place
                                    </div>
                                </div>
                            </div>
                        @else
                            @foreach ($listing->reviews as $review)
                                <div class="row review-block mb-5">
                                    <div class="col-lg-2">
                                        <div class="profile-pic-section">
                                            <div class="profile-pic-container listing-details">
                                                <img
                                                    class="card-img-top"
                                                    alt="person"
                                                    src="{{asset('storage/images').'/'.$review->review_image_path}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-10">
                                        <div class="d-flex justify-content-between mb-1">
                                            <div class="d-flex flex-column">
                                                <div class="p">{{ $review->review_name }}</div>
                                                <div class="text-secondary text-opacity-25" data-toggle="tooltip" data-placement="top" title="{{ $review->created_at }}">
                                                    {{ $review->created_at->diffForHumans(['parts' => 3, 'join' => ', ', 'short' => false]) }}
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                @for ($i = 0; $i < $review->review_rating; $i++)
                                                    <i class="fa-solid fa-star"></i>
                                                @endfor
                                            </div>
                                        </div>
                                        <div class="review-comments h6">
                                            {{ $review->review_description }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <!-- <button class="btn btn-outline-primary">Load more reviews</button> -->
                </div>
            </div>
            <div class="col col-lg-5 review-form">
                <div class="card px-3 py-3">

                    {{-- Review Title --}}
                    <div class="title mt-3">
                        <div class="h3">Leave a Review</div>
                        <hr class="baby">
                    </div>

                    {{-- Review Form, 1, 2, 3, 4, 5 --}}
                    <div class="review-form">
                        <form name="add-review-post-form" id="add-review-post-form" method="post" action="{{ url('store-review') }}">
                            @csrf

                            {{-- Review Form, Part 1 Stars --}}
                            {{-- /*****************************************************************************
                            The code below uses elements from:
                            *Title: 5 star rating with css and html
                            *Author: allenhe
                            *Code version:
                            *Availability: https://codepen.io/hesguru/pen/BaybqXv (Accessed 2 January 2023)
                            *****************************************************************************/ --}}
                            <div>Ratings</div>
                            <div class="rating-stars text-center mb-3">
                                <div class="review_rating justify-content-center">
                                    <input type="radio" id="star5" name="review_rating" value="5" required/>
                                    <label for="star5" title="text">5 stars</label>
                                    <input type="radio" id="star4" name="review_rating" value="4" />
                                    <label for="star4" title="text">4 stars</label>
                                    <input type="radio" id="star3" name="review_rating" value="3" />
                                    <label for="star3" title="text">3 stars</label>
                                    <input type="radio" id="star2" name="review_rating" value="2" />
                                    <label for="star2" title="text">2 stars</label>
                                    <input type="radio" id="star1" name="review_rating" value="1" />
                                    <label for="star1" title="text">1 star</label>
                                </div>
                            </div>

                            {{-- Review Form, Part 2 Name--}}
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="review_name" name="review_name" placeholder="Your name, your contact, or a summary...">
                                <label for="review_name">Review Name</label>
                            </div>

                            {{-- Review Form, Part 3 Comments--}}
                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Leave a comment here" id="review_description" name="review_description" style="height: 100px"></textarea>
                                <label for="review_description">Comments</label>
                            </div>

                            {{-- Review Form, Part 4 Listing ID (Hidden) --}}
                            <input type="number" id="listing_id" name="listing_id" hidden class="form-control" value={{ $listing->id }}>

                            {{-- Review Form, Part 5 Submit Button --}}
                            <button class="btn btn-warning" type="submit" value="submit">Submit Review</button>
                        </form> <!-- End Review Form -->
                    </div>
                </div>
            </div>
        </div>

        @if(session('user'))
            @if (session('user')->id == $listing->user_id)
                <div class="col-lg-12">
                    <div class="row">
                        {{-- Part 3. Applications --}}
                        <div class="card mb-3">

                            <div class="dashboard-title">
                                <div class="h3 m-3 ms-4">Property Applications ({{ count($listing->applications) }})</div>
                            </div>

                            <hr>

                            <div class="d-flex flex-wrap">

                                @foreach($listing->applications as $application)
                                    <div class="col">
                                        <a class="card listing-card blog-card">
                                            <div class="card-body">
{{--                                                <h5 class="card-title text-secondary text-opacity-25">--}}
{{--                                                    <i class="fa-solid fa-hashtag purple-ice"></i>--}}
{{--                                                    {{ $application->id }}--}}
{{--                                                    <i class="fa-solid fa-arrow-right-long"></i>--}}
{{--                                                    <b class="link-warning" onclick="window.location.href='{{ route('listings.show', ['listing' => $application->listing]) }}';">{{ $application->listing->listing_name }}</b>--}}
{{--                                                </h5>--}}
                                                <p class="card-text">
                                                    <i class="fa-solid fa-hashtag purple-ice"></i>
                                                    {{ $application->id }}
                                                    <i class="fa-solid fa-arrow-right-long"></i>
                                                    <b class="link-warning" onclick="window.location.href='{{ route('listings.show', ['listing' => $application->listing]) }}';">{{ $application->listing->listing_name }}</b>
                                                    <br>
                                                    <small style="font-size: 0.8rem;">{!! nl2br(e($application->application_description)) !!}</small>
                                                </p>
                                            </div>
                                            <div class="card-footer d-flex justify-content-between align-items-center">
                                                <small class="text-secondary text-opacity-25" data-toggle="tooltip" data-placement="top" title="{{ $application->created_at }}">
                                                    Applied {{ $application->created_at->diffForHumans(['parts' => 3, 'join' => ', ', 'short' => false]) }}
                                                </small>
                                                <form method="POST" action="{{ route('applications.destroy', ['application' => $application]) }}" name="deleteApplicationForm">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-outline-danger btn-sm" type="submit" onClick="return confirm('Delete application ID {{ $application->id }}. Are you sure?')">Delete</button>
                                                </form>
                                            </div>
                                        </a>
                                    </div>
                                    {{--                        @if ($loop->index == 6)--}}
                                    {{--                            @break--}}
                                    {{--                        @endif--}}
                                @endforeach

                            </div>

                        </div>
                    </div>
                </div>
            @endif
        @endif
    </div>
@endsection

<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript">

    window.onload = function () {
        if (window.jQuery) {
            // jQuery is loaded
            // alert("Yes jQuery");
        } else {
            // jQuery is not loaded
            // alert("No jQuery");
        }
    }
</script>
