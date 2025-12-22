@extends('layouts.app')

@section('content')

<div class="container my-5">
    <p><a href="/">Home</a> / Detail Page</p>
</div>

<div class="container my-5">
    <div class="row">
        <div class="col-md-6 text-center">
            <div class="img-container p-3 border rounded shadow-sm">
                <img src="{{ $product->image }}" class="img-fluid main-detail-img" alt="{{ $product->product_name }}">
            </div>
        </div>

        <div class="col-md-6">
            

            <h1 class="fw-bold">{{ $product->product_name }}</h1>
            <p class="text-muted">{{ $product->category }}</p>
            
            <h2 class="text-primary my-4">${{ number_format($product->price, 2) }}</h2>

            <div class="my-4">
                <h5>Description</h5>
                <p class="text-secondary">{{ $product->description }}</p>
            </div>

            <div class="d-grid gap-2">
                <button class="btn btn-dark btn-lg py-3">Add to Cart</button>
                <button class="btn btn-outline-secondary btn-lg">Add to Wishlist</button>
                <button class="btn btn-outline-danger btn-lg">Buy Now</button>
            </div>
            
            <p class="mt-4 small text-muted"><i class="fa-solid fa-truck"></i> Free delivery on orders over $50.00</p>
        </div>
    </div>
</div>
@endsection