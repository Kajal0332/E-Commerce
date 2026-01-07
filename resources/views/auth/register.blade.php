@extends('layouts.app')

@section('content')
<div class="container my-5 signup-container">
    <div class="row">
        <div class="col-md-6 text-center">
            <img src="{{asset('asset/images/signup/woman-5823482_1280.png')}}" style="height: 600px;" alt="Shopping Cart" class="img-fluid">
        </div>

        <div class="col-md-6">
            <div class="signup-box">
                <h3>Create an account</h3>
                <p>Enter your details below</p>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <!-- /* This code snippet is a part of a registration form in a Laravel application.
                    Here's a breakdown of what each part is doing: */ -->
                    <input type="text" class="form-control mb-3 @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name" value="{{ old('name') }}" autocomplete="name" autofocus required>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <input type="email" class="form-control mb-3 @error('email') is-invalid @enderror" name='email' placeholder="Email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                    <input id="password" type="password" class="form-control mb-3 @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password">
                    @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                    <input id="password-confirm" type="password" class="form-control mb-3" name="password_confirmation" placeholder="Connfirm Password" required autocomplete="new-password">
                     @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                    <button type="submit" class="btn btn-dark w-100 mb-3 signupBtn" name="createaccount">Create Account</button>
                    <button type="button" class="btn google-btn w-100">
                        <i class="fab fa-google"></i> Sign up with Google
                    </button>
                    <p class="mt-3 text-center">Already have an account? <a href="/login">Log in</a></p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection