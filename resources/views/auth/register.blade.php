@extends('layouts.app')
<body>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="title">Register</div>
                   <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="user-details">
                        <div class="input-box">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" requiredd autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                        </div>
                <div class="input-box">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" requiredd autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    <div class="input-box">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                    <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" requiredd autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="input-box">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" requiredd autocomplete="new-password">
                            </div>
                        </div>
                        <div class="input-box">
                            <label for="room_no" class="col-md-4 col-form-label text-md-end">{{ __('room_no') }}</label>

                            <div class="col-md-6">
                                <input id="room_no" type="text" class="form-control" name="room_no" requiredd autocomplete="room_no">
                            </div>
                        </div>
                        <div class="input-box">
                            <label for="ext" class="col-md-4 col-form-label text-md-end">{{ __('ext') }}</label>

                            <div class="col-md-6">
                                <input id="ext" type="text" class="form-control" name="ext" requiredd autocomplete="ext">
                            </div>
                        </div>
                        <div class="input-box">
                            <label for="profile_picture" class="col-md-4 col-form-label text-md-end">{{ __('profile_picture') }}</label>

                            <div class="col-md-6">
                                <input id="profile_picture" type="file" class="form-control" name="profile_picture" requiredd autocomplete="profile_picture">
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

