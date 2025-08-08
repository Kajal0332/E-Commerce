@extends('layouts.app')

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
                    <form action="{{ route('register.store') }}" method='POST'>
                        @csrf
                        <input type="text" class="form-control mb-3" name='fullName' placeholder="Name" value="{{ old('fullName') }}" required>
                        @error('fullName') <span class="text-danger">{{ $message }}</span> @enderror

                        <input type="email" class="form-control mb-3" name='email' placeholder="Email" value="{{ old('email') }}" required>
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror

                        <input type="number" class="form-control mb-3" name='phoneNumber' placeholder="Phone Number" value="{{ old('phoneNumber') }}" required>
                        @error('phoneNumber') <span class="text-danger">{{ $message }}</span> @enderror

                        <input type="password" class="form-control mb-3" name='password' placeholder="Password" required>
                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror

                        <input type="password" class="form-control mb-3" name='password_confirmation' placeholder="Confirm Password" required>
                        {{-- @error('password_confirmation') is handled by the 'confirmed' rule on 'password' --}}

                        {{-- Remove this line, Laravel's validation handles it --}}
                        {{-- <span class="text-danger"><?php if (isset($passwordErr)) echo 'Password does not matched' ?></span> --}}
                        
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