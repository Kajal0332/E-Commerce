@extends('layouts.app')

@section('content')

<!-- Checkout Section -->

<div class="container mb-5">
    <div class="row g-5">
        <div class="col-md-7">
            <div class="checkout-container">
                <h2 class="mb-4">Billing Details</h2>
                <form>
                    <div class="mb-3">
                        <label>First Name*</label>
                        <input type="text" class="form-control bg-light border-0" placeholder="Enter your first name">
                    </div>

                    <div class="mb-3">
                        <label>Company Name</label>
                        <input type="text" class="form-control bg-light border-0" placeholder="Company (optional)">
                    </div>

                    <div class="mb-3">
                        <label>Street Address*</label>
                        <input type="text" class="form-control bg-light border-0" placeholder="Street Address">
                    </div>

                    <div class="mb-3">
                        <label>Apartment, Floor (optional)</label>
                        <input type="text" class="form-control bg-light border-0" placeholder="Apartment, Floor, etc.">
                    </div>

                    <div class="mb-3">
                        <label>Town/City*</label>
                        <input type="text" class="form-control bg-light border-0" placeholder="Enter your city">
                    </div>

                    <div class="mb-3">
                        <label>Phone Number*</label>
                        <input type="text" class="form-control bg-light border-0" placeholder="Enter phone number">
                    </div>

                    <div class="mb-4">
                        <label>Email Address*</label>
                        <input type="email" class="form-control bg-light border-0" placeholder="Enter email address">
                    </div>

                    <div class="form-check mt-3">
                        <input type="checkbox" class="form-check-input" id="save-info">
                        <label class="form-check-label text-dark" for="save-info">Save this information for faster check-out next time</label>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-5">
            <div class="summary-box">
                <h4 class="mb-4">Order Summary</h4>

                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="d-flex align-items-center">
                        <img src="imges/bags/Bayan Kıyafet Kombinleri.jpeg" alt="Bag" class="summary-item-img">
                        <span class="fw-bold">Bagsr</span>
                    </div>
                    <span>$650</span>
                </div>

                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="d-flex align-items-center">
                        <img src="imges/bags/Luxury HandbHigh Quality Leather Handbags.jpeg" alt="Black bag" class="summary-item-img">
                        <span class="fw-bold">Black bag</span>
                    </div>
                    <span>$1100</span>
                </div>

                <hr class="my-4">

                <div class="d-flex justify-content-between mb-2">
                    <span>Subtotal:</span>
                    <span class="fw-bold">$1750</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span>Shipping:</span>
                    <span class="text-success">Free</span>
                </div>
                <div class="d-flex justify-content-between mt-3 mb-4">
                    <h5 class="fw-bold">Total:</h5>
                    <h5 class="fw-bold text-danger">$1750</h5>
                </div>

                <h6 class="fw-bold mb-3">Payment Options</h6>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="payment" id="bank" value="bank">
                    <label class="form-check-label text-dark" for="bank">Bank</label>
                </div>
                <div class="form-check mb-4">
                    <input class="form-check-input" type="radio" name="payment" id="cod" value="cod" checked>
                    <label class="form-check-label text-dark" for="cod">Cash on Delivery</label>
                </div>

                <div class="coupon-box mb-4">
                    <input type="text" class="form-control" placeholder="Coupon Code">
                    <button class="btn btn-danger px-4">Apply</button>
                </div>

                <button class="place-order w-100 btn btn-dark shadow-sm">Place Order</button>
            </div>
        </div>
    </div>
</div>

@endsection