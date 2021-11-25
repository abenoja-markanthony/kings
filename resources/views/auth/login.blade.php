@extends('layouts.app')
@section('page-css')
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet">
@endsection

@section('content')


<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-4 login_div">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div>
                    <div class="body1  text-center" style="background-color: #fff">
                        <img src="{{ asset('images/kings.png') }}" alt="Company Logo" class="logo" >
                        
                        {{-- <h3 class="mt-4 p-4 lato">KINGS</h3> --}}
                    </div>
                    <div class="panel-body body3">
                        <div class="mes_div">
                            <i class="glyphicon glyphicon-alert" style="color:#333;font-size: 20;margin-right: 10px"></i>
                            <i id="message"></i>
                        </div>
                        <br>
                        <div class="form-group input-group pl-4 pr-4">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="username" type="text" placeholder="Enter you email or username" class="form-control ml-2 mr-2 @error('email') is-invalid @enderror @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                                @error('username')
                                    <span class="invalid-feedback pl-2" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                @error('email')
                                    <span class="invalid-feedback pl-2" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group input-group  pl-4 pr-4">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="password" placeholder="Enter you password" type="password" class="form-control  ml-2 mr-2 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <div class="p-4">
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    </div>
                                @enderror
                        </div>
                        <div class="form-group input-group  p-4">
                            <button type="submit" class="btn btn-primary form-control">
                                {{ __('Login') }}
                            </button>
                        </div>
                       

                        {{-- @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif --}}
                    </div>
                </div>
            </form>
        </div>



    </div><!-- row -->


    <div class="container mt-4">
        <div class="row justify-content-center">
                <p class="text-primary">&#169; 2020 Kings. All rights reserved</p>
        </div>
    </div>

    
</div><!-- cont -->
@endsection
