@extends('layouts.app')
<body>
@section('content')
<div class="container">
    <div class="title">Register</div>
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
            <div class="user-details">
                <div class="input-box">
                <span class="details">{{ __('Name') }}</span>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" requiredd autocomplete="name" placeholder="Enter User Name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                        <div class="input-box">
                        <span class="details">{{ __('Email Address') }}</span>
                            
                        
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" requiredd autocomplete="email" placeholder="Enter Email Address">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>
                    <div class="input-box">
                    <span class="details">{{ __('Password') }}</span>
                      
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" requiredd autocomplete="new-password" placeholder="Enter Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="input-box">
                        <span class="details">{{ __('Confirm Password') }}</span>
                         
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" requiredd autocomplete="new-password" placeholder="Enter Confirm Password">
                            
                        </div>
                        <div class="input-box">
                        <span class="details">{{ __('room_no') }}</span>
                            
                                <input id="room_no" type="text" class="form-control" name="room_no" requiredd autocomplete="room_no" placeholder="Enter Room Number">
                           
                        </div>
                        <div class="input-box">
                        <span class="details">{{ __('ext') }}</span>
                            <input id="ext" type="text" class="form-control" name="ext" requiredd autocomplete="ext" placeholder="Enter Ext Number">
                        </div>
                        
                        <label for="fileUpload"> <img src="uploads/images/reg/upload.png" class="logoupload">Upload Photo Profile</label> 
                        <input id="profile_picture" type="file" name="profile_picture" requiredd autocomplete="profile_picture">
                        <button type="submit" class="btn btn-warning"> {{ __('Register') }}</button>
                        
                        
            </div>
        </form>
    </div>
</div>
@endsection
@section('section2')
<link rel="stylesheet" href="css/register.css">
@endsection
</body>



