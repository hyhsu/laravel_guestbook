@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 d-flex flex-row align-items-center justify-content-center">
            <img class="login_img img-fluid m-4" src="images/login.png" alt="login.png">
        </div>
        <div class="col-md-6 m-auto">
            <div class="card border-0 m-5">
                <div class="bg-white d-flex flex-row align-items-center justify-content-center rounded-5">
                    <div class="bg-white card-title text-center fw-bold mt-3">{{ '會員登入' }}</div>
                    <lord-icon
                        src="https://cdn.lordicon.com/tyvtvbcy.json" trigger="loop" delay="2000"
                        style="width:50px;height:30px" 
                        class="bg-white text-center align-middle">
                    </lord-icon>
                </div>
                <div class="card-body bg-white">
                    <form class="bg-white" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row mb-3 bg-white">   
                            <div class="col-md-10 m-auto bg-white">
                                <input  placeholder='{{ __('Email') }}' id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                                @error('email')
                                    <span class="bg-white invalid-feedback" role="alert">
                                        <strong class="bg-white">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
    
                        <div class="row mb-3 bg-white">
                            <div class="col-md-10 m-auto bg-white">
                                <input placeholder='{{ __('Password') }}' id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
                                @error('password')
                                    <span class="bg-white invalid-feedback" role="alert">
                                        <strong class="bg-white">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="text-center">
                                <button type="submit" class="col-md-10 btn btn-login">{{ __('Login') }}
                                </button>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="text-center">
                            <button class="col-md-10 btn btn-register"><a class="link-register nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </button>
                            </div>
                        </div>

                        <!-- <div class="bg-white mb-3 d-flex flex-column align-items-center justify-content-center">
                            <button type="submit" class="btn btn-login">
                                    {{ __('Login') }}
                            </button>
                            <button class="col-md-10 btn btn-register"><a class="link-register nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </button>
                        </div> -->
    

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
