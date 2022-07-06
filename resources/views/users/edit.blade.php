@extends('layouts.app')
<body style=" background-image: linear-gradient(57deg,rgb(235, 203, 168)0%, rgb(229 187 139)47%, rgb(240, 165, 80)100%);">
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background-color:#FEE2B3; margin-top:50px; border-radius:20px 20px;">
                

                <div class="card-body">
                    <form method="POST" action="{{ route('client.update',$data_user->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3" style="padding-top:50px;">
                            <label for="name" class="col-md-4 col-form-label text-md-end"><strong>{{ __('Name') }}</strong></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$data_user->name}}" required autocomplete="name" style="background-color:#E2D1BC;" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end"><strong>{{ __('Email Address') }}</strong></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$data_user->email}}" required autocomplete="email" style="background-color:#E2D1BC;">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="RoomNo" class="col-md-4 col-form-label text-md-end"><strong>{{ __('RoomNo') }}</strong></label>

                            <div class="col-md-6">
                                <input id="RoomNo" type="text" class="form-control @error('room_no') is-invalid @enderror" value="{{$data_user->room_no}}" name="room_no" style="background-color:#E2D1BC;">

                                @error('room_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Ext" class="col-md-4 col-form-label text-md-end"><strong>{{ __('ext') }}</strong></label>

                            <div class="col-md-6">
                                <input id="Ext" type="text" class="form-control @error('Ext') is-invalid @enderror" name="Ext" value="{{$data_user->ext}}" required autocomplete="new-password" style="background-color:#E2D1BC;">

                                @error('Ext')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="ProfilePicture" class="col-md-4 col-form-label text-md-end"><strong>{{ __('ProfilePicture') }}</strong></label>

                            <div class="col-md-6">
                                <input id="ProfilePicture" type="file" class="form-control @error('profile_picture') is-invalid @enderror"  name="ProfilePicture" required autocomplete="new-password" style="background-color:#E2D1BC;">
                                <img src="/uploads/images/{{$data_user->profile_picture}}" style="width:100px;height:100px; border-radius:20px 20px;">
                                @error('profile_picture')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn" style="background-color:#C7965E">
                                    {{ __('Update') }}
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