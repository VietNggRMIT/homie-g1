@extends('layouts.app')
@section('title', 'Property listings')
@section('content')

    <div class="container">

        <hr>
        <div class="breadcrumb justify-content-center">
            <h2>{{ Breadcrumbs::render('breadcrumb_listings') }}</h2>
        </div>
        <h1>Listings</h1>

        <hr>

        @livewire('live-search-listing')

        <hr>

        <div class="row row-cols-lg-3">

        @foreach ($listings as $listing)
            <div class="col" {!! $listing->listing_available == 0 ? 'style="opacity: 0.4"' : 'style="opacity: 1"' !!}>
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
                            @if ($listing->listing_specification_owner == 1)
                                {{-- code for listing where owner lives with u --}}
                                <div class="listing-feature">
                                    <i class="fa-solid fa-user-shield"></i>
                                    <span>With owner</span>
                                </div>
                            @else
                                <div class="listing-feature">
                                    <i class="fa-solid fa-user-slash"></i>
                                    <span>Without owner</span>
                                </div>
                            @endif
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

        @foreach ($listings as $listing)
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
                                height="100"
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
                        {{-- <div>$listing->listing_specification_owner: {{ $listing->listing_specification_owner }}</div> --}}
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
            </div>

            <hr>
        @endforeach
    </div>
    @livewireScripts
@endsection
