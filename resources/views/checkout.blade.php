@extends('layouts.app')

@section('content')

<!-- Checkout Section -->

<div class="container mb-5">
    <div class="row g-5 mt-4">
    <form action="{{ route('orderNow') }}" method="POST">
        @csrf
        <div class="col-md-7">
            <div class="checkout-container">
                <h2 class="mb-4">Billing Details</h2>
                    <div class="mb-3">
                        <label>First Name*</label>
                        <input type="text" class="form-control bg-light border-0" name="username" placeholder="Enter your first name">
                    </div>

                    <div class="mb-3">
                        <label>Street Address*</label>
                        <input type="text" class="form-control bg-light border-0" name="streetAddress" placeholder="Street Address">
                    </div>

                    <div class="mb-3">
                        <label>Apartment, Floor (optional)</label>
                        <input type="text" class="form-control bg-light border-0" name="apartment" placeholder="Apartment, Floor, etc.">
                    </div>

                    <div class="mb-3">
                        <label>Town/City*</label>
                        <input type="text" class="form-control bg-light border-0" name="city" placeholder="Enter your city">
                    </div>

                    <div class="mb-3">
                        <label>Phone Number*</label>
                        <input type="text" class="form-control bg-light border-0" name="phone" placeholder="Enter phone number">
                    </div>

                    <div class="mb-4">
                        <label>Email Address*</label>
                        <input type="email" class="form-control bg-light border-0" name="email" placeholder="Enter email address">
                    </div>

                    <div class="form-check mt-3">
                        <input type="checkbox" class="form-check-input" id="save-info">
                        <label class="form-check-label text-dark" for="save-info">Save this information for faster check-out next time</label>
                    </div>
            </div>
        </div>


        <div class="col-md-5">
            <div class="summary-box">
                <h4 class="mb-4">Order Summary</h4>
                @foreach ($cartItems as $item)
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('images/' . $item->image) }}" alt="{{ $item->product_name }}" class="summary-item-img">
                        <span class="fw-bold">{{ $item->product_name }}</span>
                    </div>
                    <span>${{ number_format($item->price * $item->quantity, 2) }}</span>
                </div>
                @endforeach
                <p>
                    <span class="fw-bold">Subtotal:</span>
                    <span class="fw-bold float-end">${{ number_format($subtotal ?? 0, 2) }}</span>
                </p>
                <h6 class="fw-bold mb-3">Payment Options</h6>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="total_amount" id="bank" value="bank">
                    <label class="form-check-label text-dark" for="bank">Bank</label>
                </div>
                <div class="form-check mb-4">
                    <input class="form-check-input" type="radio" name="total_amount" id="cod" value="cod" checked>
                    <label class="form-check-label text-dark" for="cod">Cash on Delivery</label>
                </div>

                <button class="place-order w-100 btn btn-dark shadow-sm">Place Order</button>
            </div>
        </div>
    </form>
    </div>
</div>

@endsection