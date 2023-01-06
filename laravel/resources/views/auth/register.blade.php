{{-- /*****************************************************************************
The code below uses elements from:
*Title: ui/register.stub
*Author: driesvints
*Date: 20 January 2022
*Code version: #217
*Availability: https://github.com/laravel/ui/blob/4.x/src/Auth/bootstrap-stubs/auth/register.stub (Accessed 30 December 2022)
*****************************************************************************/ --}}

@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row account-bg my-5">

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
                    <h4>Start renting and listing easily on our platform</h4>

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
                    <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="user_email_address" class="mb-1">{{ __('Email Address') }}</label>
                            <div class="input-group">
                                <i class="fa-solid fa-envelope"></i>
                                <input id="user_email_address" type="email" class="form-control @error('user_email_address') is-invalid @enderror" name="user_email_address" value="{{ old('user_email_address') }}" required autocomplete="user_email_address" placeholder="sample@gmail.com">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="user_password" class="mb-1">{{ __('Password') }}</label>
                            <div class="input-group">
                                <i class="fa-solid fa-key"></i>
                                <input id="user_password" type="password" class="form-control @error('user_password') is-invalid @enderror" name="user_password" required autocomplete="new-user_password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="password-confirm" class="mb-1">{{ __('Confirm Password') }}</label>
                            <div class="input-group">
                                <i class="fa-solid fa-key"></i>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirm" required autocomplete="new-user_password" placeholder="Re-type Password">
                                @error('password')
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
                                <input id="user_real_name" type="text" class="form-control" name="user_real_name" value="{{ old('user_real_name') }}" required autocomplete="user_real_name" placeholder="Linus Torvalds" autofocus>
                            </div>
                        </div>


                        <div class="form-group mb-3">
                            <label for="user_phone_number" class="mb-1">{{ __('Phone number') }}</label>
                            <div class="input-group">
                                <i class="fa-solid fa-phone"></i>
                                <input id="user_phone_number" type="text" class="form-control" name="user_phone_number" value="{{ old('user_phone_number') }}" required autocomplete="user_phone_number" placeholder="012354435" autofocus>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="user_description" class="mb-1">{{ __('Short description about you') }}</label>
                            <div class="input-group">
                                <i class="fa-regular fa-comments"></i>
                                <textarea id="user_description" class="form-control" name="user_description" required></textarea>
                            </div>
                        </div>


                        <div class="form-group mb-4">
                        <label for="image_upload" class="mb-1">{{ __('Upload profile picture') }}</label>
                            <div class="input-group">
                                <i class="fa-solid fa-image"></i>
                                <input class="form-control pic-upload" type="file" id="image_upload" name="image_upload">
                            </div>
                        </div>

                        <div class="d-grid col-6 mx-auto mb-5">
                            <button class="btn btn-primary" type="submit" name="signup">Sign up</button>
                        </div>
                        <p class="text-center">Already a member? <a href="{{ route('login.create')}}">Sign in</a></p>

                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
