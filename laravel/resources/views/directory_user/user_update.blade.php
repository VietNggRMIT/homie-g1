@extends('layouts.app')

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
                    <h4>Update personal information</h4>

                    @if (isset($message))
                        <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    @endif
                    {{-- /*****************************************************************************
                    The code below uses elements from:
                    *Title: 	CSRF Protection
                    *Author: Laravel
                    *Code version: 9.x
                    *Availability: https://laravel.com/docs/9.x/csrf (Accessed 7 December 2022)
                    *****************************************************************************/ --}}
                    <form method="POST" action="{{ url("update-user/{$user->id}") }}" enctype="multipart/form-data">
                        @csrf    

                        <div class="form-group mb-3">
                            <label for="user_email_address" class="mb-1">{{ __('Email Address') }}</label>
                            <div class="input-group">
                                <i class="fa-solid fa-envelope"></i>
                                <input id="user_email_address" type="email" class="form-control" name="user_email_address" value="{{ $user->user_email_address }}" required placeholder="Email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>    

                        <hr>

                        <div class="form-group mb-3">
                            <label for="user_real_name" class="mb-1">{{ __('Name') }}</label>
                            <div class="input-group">
                                <i class="fa-solid fa-user"></i>
                                <input id="user_real_name" type="text" class="form-control" name="user_real_name" value="{{ $user->user_real_name }}" required autocomplete="user_real_name" placeholder="Name" autofocus>
                            </div>
                        </div>


                        <div class="form-group mb-3">
                            <label for="user_phone_number" class="mb-1">{{ __('Phone number') }}</label>
                            <div class="input-group">
                                <i class="fa-solid fa-phone"></i>
                                <input id="user_phone_number" type="text" class="form-control" name="user_phone_number" value="{{ $user->user_phone_number }}" required autocomplete="user_phone_number" placeholder="Phone number" autofocus>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="user_description" class="mb-1">{{ __('Short description about you') }}</label>
                            <div class="input-group">
                                <i class="fa-regular fa-comments"></i>
                                <textarea id="user_description" class="form-control" name="user_description">{{ $user->user_description }}</textarea>
                            </div>
                        </div>
                        
            
                        <div class="form-group mb-4">
                        <label for="image_upload" class="mb-1">{{ __('Upload profile picture') }}</label>
                            <div class="input-group">
                                <i class="fa-solid fa-image"></i>
                                <input class="form-control pic-upload" type="file" id="image_upload" name="image_upload">
                            </div>
                        </div>

                        <input hidden name="user_id" value="{{ $user->id}}">
                        <div class="d-grid col-6 mx-auto mb-5">
                            <button class="btn btn-primary" type="submit" name="confirm">Confirm changes</button>
                        </div>
                    
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection