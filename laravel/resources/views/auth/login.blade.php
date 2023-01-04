@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">


        <div class="row account-bg my-5">
            <div class="col-lg-7 d-lg-flex d-none position-relative account-bgi bgi-signin">
                <div class="overlay overlay-signin">
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
                        <h2>Welcome back!</h1>
                        <form method="POST" action="{{ route('login.store')}}">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="email" class="col-md-4 col-form-label">{{ __('Email Address') }}</label>
                                <div class="input-group">
                                    <i class="fa-solid fa-envelope"></i>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}</label>
                                <div class="input-group">
                                    <i class="fa-solid fa-key"></i>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="d-grid col-6 mx-auto mb-5">
                                <button class="btn btn-primary" type="submit" name="signup">Sign in</button>
                            </div>
                            <p class="text-center">Need an account? <a href="{{ route('users.create')}}">Sign up</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login.store')}}">
                        @csrf
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> -->
    </div>
</div>
@endsection