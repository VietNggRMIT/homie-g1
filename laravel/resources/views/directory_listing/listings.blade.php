@extends('layouts.app')
@section('title', 'Listings')
@section('content')

    <div class="container show-listings">

        @if(session('listing_success_destroy'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <span>Deleted listing from the database!</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="title-section mt-5">
            <div class="title h1">
                Property Listings
            </div>
            <hr class="baby">
        </div>

        <div class="breadcrumb justify-content-center mt-5">
            <h2>{{ Breadcrumbs::render('breadcrumb_listings') }}</h2>
        </div>

        <div>
            @livewire('listing-results')
        </div>

    </div>
    @livewireScripts
@endsection
