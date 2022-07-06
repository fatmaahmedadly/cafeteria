<body style="   background-image: linear-gradient(57deg,rgb(235, 203, 168)0%, rgb(229 187 139)47%, rgb(240, 165, 80)100%);  margin:0;padding:0;font-family: Adobe Garamond Pro Bold;">
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card" style="margin-left:50px;background-color:#FEE2B3;border-radius:20px 20px; padding-to:50px ">
    
        <form method="POST" action="{{ route('client.store') }}" enctype="multipart/form-data">
                    @csrf
            <div class="user-details" style="margin-left:350px; padding-top:100px">
                <div class="input-box">
                <span class="details"><strong>{{ __('Name') }}</strong></span>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" requiredd autocomplete="name" placeholder="Enter User Name" style="width:500px; background-color:#e2c698" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                        <div class="input-box">
                        <span class="details"><strong>{{ __('Email Address') }}</strong></span>
                            
                        
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" requiredd autocomplete="email" placeholder="Enter Email Address" style="width:500px; background-color:#e2c698">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>
                    <div class="input-box">
                    <span class="details"><strong>{{ __('Password') }}</strong></span>
                      
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" requiredd autocomplete="new-password" placeholder="Enter Password" style="width:500px; background-color:#e2c698">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="input-box">
                        <span class="details"><strong>{{ __('Confirm Password') }}</strong></span>
                         
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" requiredd autocomplete="new-password" placeholder="Enter Confirm Password" style="width:500px; background-color:#e2c698">
                            
                        </div>
                        <div class="input-box">
                        <span class="details"><strong>{{ __('room_no') }}</strong></span>
                            
                                <input id="room_no" type="text" class="form-control" name="room_no" requiredd autocomplete="room_no" placeholder="Enter Room Number" style="width:500px; background-color:#e2c698">
                           
                        </div>
                        <div class="input-box">
                        <span class="details"><strong>{{ __('ext') }}</strong></span>
                            <input id="ext" type="text" class="form-control" name="ext" requiredd autocomplete="ext" placeholder="Enter Ext Number" style="width:500px; background-color:#e2c698">
                        </div>
                        
                         <div>
                         <span class="details"><strong>{{ __('profile_picture') }}</strong></span></br>
                        <input id="profile_picture" type="file" name="profile_picture" requiredd autocomplete="profile_picture" style="width:500px; background-color:#e2c698"></br></br>
                        <button type="submit" class="btn" style="margin-left:425px; background-color:#351801;color: #ffe9d6;"> {{ __('Register') }}</button>
                        </div>
                        
                        
            </div>
        </form>
    </div>
</div>
</div>
@endsection

</body>



