<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/customScript.js', 'resources/js/app.js', 'webfonts.css'])
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>
    
    <div class="container">
        <div>
            <button
                onclick="window.location.href='{{ route('route_home') }}';"
                type="button"
                class="btn btn-primary"
            >
                Home
            </button>
            <button
                onclick="window.location.href='{{ route('listings.index') }}';"
                type="button"
                class="btn btn-primary"
            >
                Listings
            </button>
            <button
                onclick="window.location.href='{{ route('blogs.index') }}'"
                type="button"
                class="btn btn-primary"
            >
                Blogs
            </button>
            <button
                onclick="window.location.href='{{ route('route_about') }}'"
                type="button"
                class="btn btn-primary"
            >
                About
            </button>
            <button
                onclick="window.location.href='{{ url()->previous() }}';"
                type="button"
                class="btn btn-primary"
            >
                Back to previous page
            </button>
        </div>
    </div>
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
                            <q class="quote"><i>Renting easy like your homie</i></q> - Founder                  
                            </p>
                        </div>
                    </div>
                </div>
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
                                <a href=""><img src="{{ asset('storage/images/filter-img/DDN-listing.png')}}" alt="DDN"></a><br>
                            </div>
                            <div class="under-img-box">
                                <a href=""><img src="{{ asset('storage/images/filter-img/DNA-listing.png')}}" alt="DNA"></a>
                            </div>
                        </div>
                    </div>
                </div>
        <div>
            <!-- <div>There are
                <span data-purecounter-end="{{ $custom_count[0] }}" class="purecounter">0</span> listings available
                (<span data-purecounter-end="{{ $custom_count[1] }}" class="purecounter">0</span> listing images,
                <span data-purecounter-end="{{ $custom_count[2] }}" class="purecounter">0</span> reviews,
                <span data-purecounter-end="{{ $custom_count[3] }}" class="purecounter">0</span> applications)
            </div>
            <div>There are <span data-purecounter-end="{{ $custom_count[4] }}" class="purecounter">0</span> users online.</div>
            <div>There are <span data-purecounter-end="{{ $custom_count[5] }}" class="purecounter">0</span> blogs to read.</div>
        </div> -->


        <div class="row">
            <hr>
            <div class="d-flex justify-content-between align-items-center">
                <h1>Listings</h1>
                <a href="{{ route('listings.index') }}" class="btn btn-lg btn-secondary">See more</a>
            </div>
        </div>
        @foreach ($listings as $listing)
            <div class="card mb-3" style="max-width: 540px; cursor: pointer;" onclick="window.location='{{ route('listings.show', ['listing' => $listing]) }}';" >
                <div class="row g-0">
                    <div class="col-md-4">
                        @if($listing->listingimages->isEmpty())
                            <img
                                src="https://via.placeholder.com/300.png/"
                                class="img-fluid rounded-start"
                            >
                        @else
                            <img
                                src="{{ asset('storage/images/').'/'.$listing->listingimages->first()->listing_image_path }}"
                                class="img-fluid rounded-start"
                            >
                        @endif
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $listing->listing_name }}</h5>
                            <p class="card-text">
                                {{ $listing->listing_address_subdivision_1 }}
                            </p>
                            <p class="card-text">
                                {{ (float) $listing->reviews_avg_review_rating }}
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                </svg>
                                ({{ (int) $listing->reviews_count }} reviews)
                                {{ (int) $listing->applications_count }}
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-fill text-primary" viewBox="0 0 16 16">
                                    <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"/>
                                </svg>
                            </p>
                            <div class="card-text"><small class="text-muted">Posted by: {{ $listing->user->user_real_name }}</small></div>
                            <div class="card-text">
                                <small class="text-muted" data-toggle="tooltip" data-placement="top" title="{{ $listing->updated_at }}">
                                    Last updated: {{ date_diff(new \DateTime($listing->updated_at), new \DateTime(now()))->format("%m months, %d days, %h hours") }} ago
                                </small
                                ></div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach


        <div class="row">
            <hr>
            <div class="d-flex justify-content-between align-items-center">
                <h1>Blogs</h1>
                <a href="{{ route('blogs.index') }}" class="btn btn-lg btn-secondary">See more</a>
            </div>
        </div>
        @foreach ($blogs as $blog)
            <div class="card mb-2">
{{--                <div class="card-header">--}}

{{--                </div>--}}
                <div class="card-body">
                    <h5 class="card-title">{{ $blog->blog_name }}</h5>
                    <p class="card-text text-truncate">{{ $blog->blog_description }}</p>
                    <a href="{{ route('blogs.show', ['blog'=>$blog]) }}" class="btn btn-outline-secondary">Read more</a>
                </div>
                <div class="card-footer text-muted"
                     data-toggle="tooltip"
                     data-placement="top"
                     title="{{ $listing->updated_at }}"
                >
                    {{ date_diff(new \DateTime($listing->updated_at), new \DateTime(now()))->format("%m months, %d days, %h hours") }}
                    ago
                </div>
            </div>
        @endforeach
    </div>
    
</body>
<footer>
<?php
        require($_SERVER['DOCUMENT_ROOT'].'/storage/template/footer.blade.php');
    ?>  
</footer>
</html>
