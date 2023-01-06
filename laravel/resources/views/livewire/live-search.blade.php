        {{-- /*****************************************************************************
        The code below uses elements from:
        *Title: Quickstart
        *Author: Laravel Livewire
        *Code version: 2.x
        *Availability: https://laravel-livewire.com/docs/2.x/quickstart (Accessed 30 December 2022)
        *****************************************************************************/ --}}
<div>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <form class="d-flex search-filter" role="search">

                <input wire:model="searchTerm" class="form-control border-end-0 border rounded-pill me-2" type="search" placeholder="Property name, street address, description, anything" aria-label="Property name, street address, description, anything">

                <!-- <button disabled class="btn btn-outline-success" type="submit">Search</button> -->
{{--                <span class="input-group-append">--}}
{{--                    <button disabled class="btn btn-outline-secondary border-bottom-0 border rounded-pill ms-n5" type="button">--}}
{{--                        <i class="fa fa-search"></i>--}}
{{--                    </button>--}}
{{--                </span>--}}
            </form>

            <div class="list-group" style="position: absolute; z-index: 996;">
                @if($listings && $listings->count() > 0)
                    @foreach($listings as $listing)
                        <a class="text-decoration-none list-group-item list-group-item-action" href="{{ route('listings.show', ['listing'=>$listing]) }}">
{{--                            <div class="search-listing-name-id">--}}
{{--                                <i class="fa-solid fa-hashtag purple-ice"></i>--}}
{{--                                <span class="text-secondary text-opacity-25">{{ $listing->id }}</span>--}}
{{--                                <span>/ {{ $listing->listing_name }}</span>--}}
{{--                            </div>--}}
{{--                            <div class="search-listing-location">--}}
{{--                                <i class="fa-solid fa-location-dot purple-ice"></i>--}}
{{--                                <span>{{ $listing->listing_address_subdivision_1 }}</span>--}}
{{--                            </div>--}}
{{--                            <div class="search-listing-reviews d-flex align-items-center">--}}
{{--                                <span>{{ (float) $listing->reviews_avg_review_rating }}</span>--}}
{{--                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill text-warning" viewBox="0 0 16 16">--}}
{{--                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>--}}
{{--                                </svg>--}}
{{--                                <span class="text-secondary text-opacity-25">({{ (int) $listing->reviews_count }})</span>--}}
{{--                                <span>{{ (int) $listing->applications_count }}</span>--}}
{{--                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-fill text-primary" viewBox="0 0 16 16">--}}
{{--                                    <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"/>--}}
{{--                                </svg>--}}
{{--                            </div>--}}
                            <div class="d-flex flex-row align-items-center">
{{--                                <i class="fa-solid fa-hashtag purple-ice"></i>--}}
{{--                                <span class="text-secondary text-opacity-25">{{ $listing->id }} /</span>--}}
                                <span>{{ $listing->listing_name }}</span>
                            </div>
                            <div class="d-flex flex-row align-items-center">
                                <i class="fa-solid fa-location-dot purple-ice"></i>
                                <span class="ms-2">{{ $listing->listing_address_subdivision_1.' '.$listing->listing_address_subdivision_2 }}</span>
                            </div>
                            <div class="d-flex flex-row align-items-center">

                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                </svg>
                                <span class="ms-1">{{ round((float) $listing->reviews_avg_review_rating, 2) }}</span>
                                <span class="text-secondary text-opacity-25 ms-1">({{ (int) $listing->reviews_count }})</span>

                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-fill text-primary ms-3" viewBox="0 0 16 16">
                                    <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"/>
                                </svg>
                                <span class="ms-1">{{ (int) $listing->applications_count }}</span>
                            </div>
                        </a>
                    @endforeach
                @else
{{--                    <li class="list-group-item">Not found</li>--}}
                @endif
            </div>
        </div>
    </div>
</div>
