@extends('layouts.app')
@section('title', 'Listing'.' '.$listing->listing_name)
@section('content')

    <div class="container">

        @if(session('listing_success_store'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span>Saved listing ID: {{ $listing->id }} to the database!</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session('listing_success_update'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span>Updated listing ID: {{ $listing->id }} to the database!</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session('application_success_store'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span>You successfully applied to the listing ID: {{ $listing->id }}!</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session('review_success_store'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span>You successfully reviewed to the listing ID: {{ $listing->id }}!</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row mt-5">
            <div class="col-xl">

                <div class="listing-img-carousel">
                    <div id="carouselExampleIndicators" class="carousel slide listing-carousel" data-bs-ride="true">
                        <div class="carousel-indicators">
                            <!-- $listing->listingimages: -->
                            @if($listing->listingimages->isEmpty())
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">
                                    <img src="https://via.placeholder.com/300.png/" class="d-block w-100 img-fluid">
                                </button>
                            @else
                                @foreach ($listing->listingimages as $listingimage)
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">
                                        <img src="{{ asset('storage/images/').'/'.$listingimage->listing_image_path }}" class="d-block w-100 img-fluid">
                                    </button>
                                @endforeach
                            @endif
                            <!-- @foreach ($listing->listingimages as $listingimage)
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">
                                    <img src="{{ asset('storage/images/').'/'.$listingimage->listing_image_path }}" class="d-block w-100 img-fluid">
                                </button>
                            @endforeach -->
                            <!-- <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">
                                <img src="php1\resources\listing_image\1.jpg" class="d-block w-100 img-fluid">
                            </button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2">
                                <img src="php1\resources\listing_image\2.jpg" class="d-block w-100 img-fluid">
                            </button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3">
                                <img src="php1\resources\listing_image\3.jpg" class="d-block w-100 img-fluid">
                            </button> -->
                        </div>
                        <div class="carousel-inner">
                            @if($listing->listingimages->isEmpty())
                                <div class="carousel-item">
                                    <img src="https://via.placeholder.com/300.png/" class="d-block w-100" alt="...">
                                </div>
                            @else
                                @foreach ($listing->listingimages as $listingimage)
                                    <div class="carousel-item active">
                                        <img src="{{ asset('storage/images/').'/'.$listingimage->listing_image_path }}" class="d-block w-100" alt="...">
                                    </div>
                                @endforeach
                            @endif
                            <!-- <div class="carousel-item active">
                                <img src="php1\resources\listing_image\1.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="php1\resources\listing_image\2.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="php1\resources\listing_image\3.jpg" class="d-block w-100" alt="...">
                            </div> -->
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

            </div>
        </div>
        @if(session('user'))
            @if (session('user')->id == $listing->user->id)
                <div class="listing-modifications d-flex justify-content-end mt-3">
                    <form class="" method="POST" action="{{ url("delete-listing/{$listing->id}") }}">
                        @csrf
                        <button class="btn btn-outline-danger" type="submit">Delete this listing</button>
                    </form>
                    <div class="ms-3">
                        <a class="btn btn-outline-primary" href="{{ route('listings.edit', ['listing' => $listing]) }}">Edit this listing</a>
                    </div>
                </div>
            @endif
        @endif
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
        <div class="breadcrumb justify-content-center">
            <h2>{{ Breadcrumbs::render('breadcrumb_listing', $listing) }}</h2>
        </div>

        <div class="row listing-description mt-5">
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

                    </div>
                    {{-- 5. Updated Date --}}
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <small class="text-muted" data-toggle="tooltip" data-placement="top" title="{{ $listing->updated_at }}">
                                Posted: {{ date_diff(new DateTime($listing->created_at), new DateTime(now()))->format("%m months, %d days, %h hours") }} ago
                            </small>
                            <small class="text-muted" data-toggle="tooltip" data-placement="top" title="{{ $listing->updated_at }}">
                                Last updated: {{ date_diff(new DateTime($listing->updated_at), new DateTime(now()))->format("%m months, %d days, %h hours") }} ago
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
                            <div class="card-text price mb-0"><strong>{{ number_format( (int) $listing->listing_price) }} VND</strong><span class="light-gray"> /month</span></div>
                            <div class="listing-rating">
                                <i class="fa-solid fa-star"></i>
                                <span>{{ round( (float) $listing->reviews_avg_review_rating, 2) }}</span>
                                <span class="sum-review light-gray">({{ (int) $listing->reviews_count }})</span>
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
                                <a class="btn btn-warning btn-lg px-5" href="{{ route('applications.create', ['listing' => $listing->id]) }}">Apply Now! 🔥</a>
                            @else
                                <a class="btn btn-secondary btn-lg px-5 disabled text-decoration-line-through" href="{{ route('applications.create', ['listing' => $listing->id]) }}">Not Available 🥶</a>
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
                        <div class="h2">Owner</div>
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
                                        {{-- COUNT --}} <span class="sum-review light-gray">({{ $custom_user->reviews_count }}) |</span>
                                        {{-- Paper Plane --}} <i class="fa-solid fa-paper-plane purple-ice"></i>
                                        {{-- COUNT --}} <b>{{ $custom_user->applications_count }}</b>
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
                                    <li><p>Since: {{ $listing->user->created_at }} <i class="fa-regular fa-user"></i></p></li>
                                    <li><p>Date of Birth: 6/12/2000 <i class="fa-sharp fa-solid fa-cake-candles"></i></p></li>
                                </ul>
                            </div>
                        </div>
                        <div class="mt-3 mx-auto">
                            <a href="mailto:{{ $listing->user->user_email_address }}" class="btn btn-warning mb-3">Contact owner</a>
                            <a href="{{ route('users.show', ['user' => $listing->user]) }}" class="btn btn-warning mb-3">View profile</a>
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
                        <div class="h3">Reviews ({{ (int) $listing->reviews_count }})</div>
                        <hr class="baby">
                    </div>

                    <div>
                        @if($listing->reviews->isEmpty())

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
                                                <div class="p">Review name: {{ $review->review_name }}</div>
                                                <div class="text-secondary text-opacity-25">{{ date_diff(new DateTime($review->created_at), new DateTime(now()))->format("%m months, %d days, %h hours") }} ago</div>
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
                    <button class="btn btn-outline-primary">Load more reviews</button>
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
                            <button class="btn btn-warning" type="submit" value="submit">Submit review</button>
                        </form> <!-- End Review Form -->
                    </div>
                </div>
            </div>
        </div>

        {{-- <div {!! $listing->listing_available == 0 ? 'style="opacity: 0.4"' : 'style="opacity: 1"' !!}>
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
                <div>$listing->listing_description: {!!  nl2br(e($listing->listing_description)) !!}</div>
                <div>$listing->listing_address_subdivision_1: {{ $listing->listing_address_subdivision_1 }}</div>
                <div>$listing->listing_address_subdivision_2: {{ $listing->listing_address_subdivision_2 }}</div>
                <div>$listing->listing_address_subdivision_3: {{ $listing->listing_address_subdivision_3 }}</div>
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
                                height="100"
                            >
                        @endforeach
                    @endif
                </div>
                <div>$listing->listing_price: {{ number_format( (int) $listing->listing_price) }}</div>
                <div>$listing->listing_available: {{ $listing->listing_available }}</div>
                <div>$listing->listing_address_coordinate: {{ $listing->listing_address_coordinate->latitude.",".$listing->listing_address_coordinate->longitude }}</div>
                <div>$listing->listing_specification_bedroom: {{ $listing->listing_specification_bedroom }}</div>
                <div>$listing->listing_specification_bathroom: {{ $listing->listing_specification_bathroom }}</div>
                <div>$listing->listing_specification_size: {{ $listing->listing_specification_size }}</div>
                @if ($listing->listing_specification_owner == 1)
                    {{-- <div>$listing->listing_specification_owner: {{ $listing->listing_specification_owner }}</div>
                    <div>Lives with owner</div>
                @else
                    <div>Doesnt live with owner</div>
                @endif
                <div>$listing->listing_specification_tenant: {{ $listing->listing_specification_tenant }}</div>
                <div>$listing->user_id: {{ $listing->user_id }}</div>
                <div>$listing->created_at: {{ $listing->created_at }}</div>
                <div>$listing->updated_at: {{ $listing->updated_at }}</div>
            </div>

            <div>
                <h2>Special</h2>
                <div>$listing->reviews_avg_review_rating: {{ (float) $listing->reviews_avg_review_rating }} stars from $listing->reviews_count: {{ (int) $listing->reviews_count }} reviews</div>
                <div>$listing->applications_count: {{ (int) $listing->applications_count }} applications</div>
            </div>

            <div>
                <h2>Posted by</h2>
                <div>$listing->user->id: {{ $listing->user->id }}</div>
                <div>
                    $listing->user->user_real_name:
                    <button
                        onclick="window.location.href='{{ route('users.show', ['user' => $listing->user]) }}';"
                        type="button"
                    >
                        {{ $listing->user->user_real_name }}
                    </button>
                </div>
            </div>
            <div>
                $listing->reviews:
                @if($listing->reviews->!isEmpty())

                @else
                    @foreach ($listing->reviews as $review)
                        <h2>{{ $review->review_name }} --- {{ $review->review_rating }} stars</h2>
                        <h3>{{ $review->review_description }}
                    @endforeach
                @endif
            </div>
        </div> --}}
    </div>
@endsection
