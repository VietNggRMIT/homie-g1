{{-- /*****************************************************************************
The code below uses elements from:
*Title: Quickstart
*Author: Laravel Livewire
*Code version: 2.x
*Availability: https://laravel-livewire.com/docs/2.x/quickstart (Accessed 30 December 2022)
*****************************************************************************/ --}}
<div class="container">
    <div class="search-filter" role="search">
        <input wire:model="searchName" wire:change="filter" class="form-control border-end-0 border rounded-pill me-2 search-name" type="text" placeholder="Search by name" aria-label="Search">
    </div>
    <div class="text-center my-3">
        @if (!$searched)
            Showing {{ $listings->firstItem() }} - {{ $listings->lastItem() }} listings from the total of {{ $listings->total() }} listings.
        @else
            @isset($total)
                Showing {{ $total }} results matching your search.
            @endisset
        @endif
    </div>

    <div class="row gy-3 mt-3 listings-filter-group">

        <div class="col col-lg-3">
            <div class="filter-section p-3">

                <div class="search-filter mb-3">
                    <input wire:model="searchAddress" wire:change="filter" wire:keydown.backspace="addressChanged" wire:keydown.delete="addressChanged" class="form-control border-end-0 border rounded-pill me-2" type="text" placeholder="Search by address e.g. 'Ha Noi' or 'Ba Dinh'" aria-label="Search">
                </div>

                <hr class="baby">

                <div class="filter-queries">

                    <div class="mb-3">
                        <label class="mb-1 d-block" for="filterRating">Filter listings by rating</label>
                        <select class="form-control" wire:model="filterRating" id="filterRating">
                            <option value="allRatings">Show listings of all ratings</option>
                            <option value="5star">5 star listings</option>
                            <option value="4star">4 star listings</option>
                            <option value="3star">3 star listings</option>
                            <option value="2star">2 star listings</option>
                            <option value="1star">1 star listings</option>
                            <option value="unrated">Unrated listings</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="mb-1 d-block" for="order">Order listings by</label>
                        <select class="form-control" wire:model="order" id="order">
                            <option selected value="byID">Listing ID</option>
                            <option value="priceAscending">Price, from low to high</option>
                            <option value="priceDescending">Price, from high to low</option>
                            <option value="created">Most recently created</option>
                            <option value="updated">Most recently updated</option>
                            <option value="mostApp">Most applications submitted</option>
                        </select>
                    </div>
                    <div class="range-slider">
                        Choose your desired rent per month:
                        <div>
                            <label class="d-block" for="minPrice">Minimum price: {{ $minPrice * 1000000 }} VND
                                <!-- <h4 id="minPriceDisplay">{{ $minPrice * 1000000 }} VND</h4> -->
                            </label>
                            <input class="slider" wire:model="minPrice" type="range" id="minPrice" name="minPrice" min="0" max="10" value="0">
                        </div>
                        <div>
                            <label class="d-block" for="maxPrice">Maximum price: {{ $maxPrice * 1000000 }} VND
                                <!-- <h4 id="maxPriceDisplay">{{ $maxPrice * 1000000 }} VND</h4> -->
                            </label>
                            <input class="slider" wire:model="maxPrice" type="range" id="maxPrice" name="maxPrice" min="3" max="20" value="20">
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-warning d-block mb-2" wire:click="resetPrice">Reset price range</button>
                            <button class="btn btn-warning d-block" wire:click="resetAll">Reset all queries</button>
                        </div>
                    </div>

                </div>

            </div>

        </div>


        <div class="col col-lg-9">

            <div class="listings">

                <div class="row row-cols-xl-3">
                    @foreach ($listings as $listing)
                        {{-- <h1>{{ dd($listings) }}</h1> --}}
                        <div class="col" {!! $listing->listing_available == 0 ? 'style="opacity: 0.4"' : 'style="opacity: 1"' !!}>
                            <a class="card listing-card responsive-listings" href="{{ route('listings.show', ['listing' => $listing]) }}">

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
                                    <div class="card-listing-location d-flex mb-2">
                                        <i class="fa-solid fa-location-dot"></i>
                                        <p class="card-text">{{ $listing->listing_address_subdivision_1 }}</p>
                                    </div>
                                    <div class="listing-amenities d-flex my-2">
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

            </div>

        </div>

    </div>


    <div class="pagination justify-content-center my-3">
        {{-- below is the box containing links to different page. only show on first landing --}}
        {{-- /*****************************************************************************
        The code below uses elements from:
        *Title: Pagination
        *Author: Laravel Livewire
        *Code version: 2.x
        *Availability: https://laravel-livewire.com/docs/2.x/pagination (Accessed 2 January 2023)
        *****************************************************************************/ --}}
        @if(!$everChanged)
            <br><div>{{ $listings->links('pagination::bootstrap-4') }}</div>
        @endif
    </div>
</div>
