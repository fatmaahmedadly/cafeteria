@extends('layouts.app')
@section('content')
<body>
<div class="loginstyle">
    <img src="uploads/images/avatar.jpg" class="avatar" width="150px"></br>
    <h1 style="color:rgb(246, 209, 171)" align="center">Login Here</h1>
    <div class="forms">
        <div class="form login">
                <form  method="POST" action="{{ route('login') }}" >
                    @csrf
                        <div class="input-field">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>
                            
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus >
                            
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div> 
                        

                        <div class="input-field">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                        
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        <div class="input-field button">
                            <input type="submit" value="login">
                                    
                        </div>
                  

                        <div>
                                @if (Route::has('password.request'))
                                    <a class="text" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                        </div>
                </form>
        </div>
    </div>
</div>
</body>

@endsection
@section('section2')
<link rel="stylesheet" href="css/login.css">
@endsection



