@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                @if (isset($message))
                    {{ $message }}
                @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="user_email_address" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                            <div class="col-md-6">
                                <input id="user_email_address" type="email" class="form-control @error('user_email_address') is-invalid @enderror" name="user_email_address" value="{{ old('user_email_address') }}" required autocomplete="user_email_address">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="user_password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="user_password" type="password" class="form-control @error('user_password') is-invalid @enderror" name="user_password" required autocomplete="new-user_password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirm" required autocomplete="new-user_password">
                            </div>
                        </div>
                        {{-- divider here please --}}
                        <hr>
                        <div class="row mb-3">
                            <label for="user_real_name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="user_real_name" type="text" class="form-control" name="user_real_name" value="{{ old('user_real_name') }}" required autocomplete="user_real_name" autofocus>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="user_phone_number" class="col-md-4 col-form-label text-md-end">{{ __('Phone number') }}</label>
                            <div class="col-md-6">
                                <input id="user_phone_number" type="text" class="form-control" name="user_phone_number" value="{{ old('user_phone_number') }}" required autocomplete="user_phone_number" autofocus>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="user_description" class="col-md-4 col-form-label text-md-end">{{ __('Short description about you') }}</label>
                            <div class="col-md-6">
                                <textarea id="user_description" class="form-control" name="user_description"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="image_upload" class="col-md-4 col-form-label text-md-end">{{ __('Upload profile picture') }}</label>
                            <div class="col-md-6">
                                <input class="form-control pic-upload" type="file" id="image_upload" name="image_upload">
                            </div>
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection