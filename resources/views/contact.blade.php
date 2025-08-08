@extends('layouts.app')

@section('content')

<!-- Breadcrumb -->
<div class="container my-5">
    <p><a href="#">Home</a> / Contact</p>
</div>

<!-- Contact Section -->
<div class="container my-5">
    <div class="row">
        <!-- Contact Info -->
        <div class="col-md-4 text-center py-5 contactInfo">
            <h4>Call To Us</h4>
            <p>We are available 24/7, 7 days a week.</p>
            <p><strong>Phone:</strong> +88061112222</p>
            <br>
            <h4>Write To Us</h4>
            <p>Fill out our form and we will contact you within 24 hours.</p>
            <p><strong>Email:</strong> customer@exclusive.com</p>
            <p><strong>Email:</strong> support@exclusive.com</p>
        </div>

        <!-- Contact Form -->
        <div class="col-md-8">
            <div class="contact-container">
                {{-- DISPLAY SUCCESS MESSAGE HERE --}}
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                {{-- DISPLAY VALIDATION ERRORS HERE --}}
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form id="contactForm" action="{{ route('contact.send') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" name="name" class="form-control mb-3" id="name" placeholder="Your Name *" value="{{ old('name') }}" required>
                        </div>
                        <div class="col-md-4">
                            <input type="email" name="email" class="form-control mb-3" id="email" placeholder="Your Email *" value="{{ old('email') }}" required>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="phone" class="form-control mb-3" id="phone" placeholder="Your Phone *" value="{{ old('phonne') }}" required>
                        </div>
                    </div>
                    <textarea class="form-control mb-3" name="message" id="message" placeholder="Your Message" rows="10" value="{{ old('message') }}" required></textarea>
                    <button type="submit" class="btn btn-custom">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection