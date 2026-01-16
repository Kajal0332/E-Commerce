@extends('layouts.app')

@section('content')
<!-- login Section -->
<div class="container my-5 signup-container">
    <div class="row">
        <!-- Left Side: Image -->
        <div class="col-md-6 text-center">
            <img src="{{asset('asset/images/signup/woman-5823482_1280.png')}}" style="height: 600px;" alt="Shopping Cart" class="img-fluid">
        </div>

        <!-- Right Side: login Form -->
        <div class="col-md-6">
            <div class="signup-box">
                <h3 class="my-2">Login your account</h3>
                <p class="mb-5">Enter your username ans password details below</p>
                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    {{-- Display general login errors (e.g., invalid credentials) --}}
                    @if ($errors->has('email') || $errors->has('password'))
                    <div class="alert alert-danger">
                        Invalid credential=s. Please try again.
                    </div>
                    @endif
                    {{-- OR more specific error for `email` if it's the identifier --}}
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <input type="text" class="form-control mb-3" name="email" placeholder="Email or Username" value="{{ old('email') }}" required autofocus>
                    {{-- Consider changing placeholder to "Email" if your users table uses email for login --}}
                    {{-- Or if you want to allow username, you'd adjust the controller logic below --}}

                    <input type="password" class="form-control mb-3" name="password" placeholder="Password" required>
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="input_container d-flex m-3">
                        <div class="input_container d-flex justify-content-between w-100">
                            <button type="submit" class="btn btn-danger">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                            @endif
                        </div>
                    </div>
                    <!-- <button type="submit" class="btn btn-dark w-100 mb-3">Login Account</button> -->
                    <button type="button" class="btn google-btn w-100">
                        <i class="fab fa-google"></i> Sign up with Google
                    </button>
                    <p class="mt-3 text-center">Don't have an account? <a href="/signup">Sign-Up</a></p> {{-- Corrected text from "Already have an account?" --}}
                </form>
            </div>
        </div>
    </div>
</div>
@endsection