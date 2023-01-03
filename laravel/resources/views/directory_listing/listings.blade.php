@extends('layouts.app')
@section('title', 'Listings')
@section('content')

    <div class="container show-listings">

        <div class="title-section mt-5">
            <div class="title h1">
                Property listings
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
