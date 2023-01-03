<div>
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
                                    <p class="card-landlord mb-1">Posted by: {{ $listing->user->user_real_name }}</p>
                                    <div class="card-listing-location d-flex mb-2">
                                        <i class="fa-solid fa-location-dot"></i>
                                        <p class="card-text">{{ $listing->listing_address_subdivision_1 }}</p>
                                    </div>
                                    <div class="listing-amenities d-flex my-2">
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

            </div>

        </div>

    </div>


    <div class="pagination justify-content-center my-3">
        {{-- below is the box containing links to different page --}}
        @if(!$searched)
            <br><div>{{ $listings->links('pagination::bootstrap-4') }}</div>
        @endif
    </div>
</div>