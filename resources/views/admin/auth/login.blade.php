@extends('layouts.auth')

@section('content')

<form class="form-login" method="POST" action="{{ route('login') }}">
    @csrf
    <div class="row">

        <div class="col-md-12 text-center mb-4">
            <img alt="logo" src="{{ asset('assets/admin/assets/img/logo-3.png')}}" class="theme-logo">
        </div>

        <div class="col-md-12">

            <label for="inputEmail" class="sr-only">Email address</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="icon-inputEmail"><i class="flaticon-user-7"></i> </span>
                </div>
                <input type="email" id="inputEmail" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email Address" aria-describedby="inputEmail" required >
                @error('email')
                    <span class="invalid-feedback mt-3" style="display: inline-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <label for="inputPassword" class="sr-only">Password</label>
            <div class="input-group mb-4">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="icon-inputPassword"><i class="flaticon-key-2"></i> </span>
                </div>
                <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" aria-describedby="inputPassword">
                @error('password')
                    <span class="invalid-feedback mt-3" style="display: inline-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="checkbox d-flex justify-content-center mt-3">
                <div class="custom-control custom-checkbox mr-3">
                    <input type="checkbox" class="custom-control-input" id="customCheck1" name="remember" {{ old('remember') ? 'checked' : '' }} value="remember-me">
                    <label class="custom-control-label" for="customCheck1">Remember me</label>
                </div>
            </div>

            <button class="btn btn-lg btn-gradient-warning btn-block btn-rounded mb-4 mt-5" type="submit">Login</button>

            <div class="forgot-pass text-center">
                <a href="{{ route('password.request') }}">Forgot Password ?</a>
            </div>

        </div>

    </div>
</form>
@endsection
