@extends('layouts.app')
@section('title', 'Change Password')
@section('content')

<div class="container">

    <div class="row account-bg my-5">
        @if (!isset($user))
            @php redirect('/home'); @endphp
        @endif

        <div class="col-lg-7 d-lg-flex d-none position-relative account-bgi bgi-signup">
            <div class="overlay overlay-signup">
                <div class="hero-item slogan">
                    <h2>Reliable and affordable housing starts here</h2>
                    <h2>Renting easily like renting from your Homie</h2>
                </div>
                <div class="hero-item"></div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="card account-card">
                <div class="card-content">
                    <h4>Change password</h4>

                    @if (isset($message))
                        <div class="alert alert-danger mt-3" role="alert">{{ $message }}</div>
                    @endif
                    {{-- /*****************************************************************************
                    The code below uses elements from:
                    *Title: 	CSRF Protection
                    *Author: Laravel
                    *Code version: 9.x
                    *Availability: https://laravel.com/docs/9.x/csrf (Accessed 7 December 2022)
                    *****************************************************************************/ --}}

                    <form method="POST" action="{{ url("update-login/{$user->id}") }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="user_password" class="mb-1">{{ __('Current password') }}</label>
                            <div class="input-group">
                                <i class="fa-solid fa-key"></i>
                                <input id="user_password" type="password" class="form-control" name="user_password" required placeholder="Current password">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="new-password" class="mb-1">{{ __('New password') }}</label>
                            <div class="input-group">
                                <i class="fa-solid fa-key"></i>
                                <input id="new_password" type="password" class="form-control" name="new_password" required placeholder="New password">
                            </div>
                        </div>

                        <input hidden name="user_id" value="{{ $user->id}}">

                        <div class="d-flex justify-content-center mx-auto mb-5">
                            <button onclick="window.location.href='{{ route('users.show', ['user' => $user]) }}';" type="button" class="btn btn-outline-danger me-5">Cancel</button>
                            <button class="btn btn-success" type="submit" name="confirm">Confirm</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
