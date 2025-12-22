@extends('layouts.app')

@section('content')
<div class="container product-card-section">
    <h2 class="fw-bold slideBodeRed my-5">Search Result </h2>
    <div class="row mt-4">
        @foreach ($product as $products)
        <div class="col-md-3 searchItem">
            <a href="productDetail/{{ $products['id'] }}" class="text-decoration-none text-dark">
            <div class="product-card">
                <i class="fa-solid fa-heart heart-icon"></i>
                <img src="{{ $products->image }}" alt="Error">
                <h5>{{ $products->product_name }}</h5>
                <p><strong>{{ $products->price }}</strong></p>
                <button class="add-to-cart">Add To Cart</button>
            </div></a>
        </div>
        @endforeach
        
    </div>
    <div class="button text-center">
        <a href=""><button class="btn btn-danger my-5 px-5">View more</button></a>
    </div>
</div>

@endsection