@extends('layouts.app')

@section('content')
<div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#imageCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#imageCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#imageCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#imageCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
    </div>

    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset("asset/images/banner/motherl's day.jpg") }}" class="d-block w-100" alt="Image 1">
        </div>
        <div class="carousel-item">
            <img src="{{ asset("asset/images/banner/beautyproduct.png") }}" alt="Image 2">
        </div>
        <div class="carousel-item">
            <img src="{{ asset("asset/images/banner/bookshop.png") }}" alt="Image 3">
        </div>
        <div class="carousel-item">
            <img src="{{ asset("asset/images/banner/music.png") }}" alt="Image 4">
            <div class="main-music-btn">
                <a href=""><button class="btn btn-danger">Shop now</button></a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('imgeSlide')
<div class="container product-card-section">
    <h2 class="fw-bold slideBodeRed my-5">Explore Our Product</h2>
    <div class="row mt-4">
        @foreach ($product as $products)
        <div class="col-md-3">
            <a href="productDetail/{{ $products['id'] }}" class="text-decoration-none text-dark">
                <div class="product-card">
                    <i class="fa-solid fa-heart heart-icon"></i>
                    <img src="{{ $products->image }}" alt="{{ $products->product_name }}" />
                    <h5>{{ $products->product_name }}</h5>
                    <p><strong>{{ $products->price }}</strong></p>
                    <!-- <button class="add-to-cart">Add To Cart</button> -->
                </div>
            </a>
        </div>
        @endforeach

    </div>

    <div class="button text-center">
        <a href="{{ route('allProducts') }}"><button class="btn btn-danger my-5 px-5">View more</button></a>
    </div>
</div>
@endsection

<!-- @section('bags')
<div class="container product-card-section">
    <h2 class="fw-bold slideBodeRed my-5">Bags</h2>
    <div class="row mt-4">
        <div class="col-md-3">
            <div class="product-card" data-id="1" data-name="Gucci duffle bag" data-price="$960">
                <span class="discount-badge">-35%</span>
                <i class="fa-solid fa-heart heart-icon"></i>
                <img src="{{asset('asset/images/bags/Bayan Kıyafet Kombinleri.jpeg')}}" alt="Gucci duffle bag" data-img="3">
                <h5 class="product-name">Gucci duffle bag</h5>
                <p class="product-price"><s>$1160</s> <strong>$960</strong></p>
                <button class="add-to-cart">Add To Cart</button>
            </div>
        </div>
        <div class="col-md-3">
            <div class="product-card">
                <i class="fa-solid fa-heart heart-icon"></i>
                <img src="{{asset('asset/images/bags/brownbag.jpeg')}}" alt="RGB Liquid CPU Cooler" data-img="4">
                <h5 class="product-name">RGB Liquid CPU Cooler</h5>
                <p class="product-price"><strong>$1960</strong></p>
                <button class="add-to-cart">Add To Cart</button>
            </div>
        </div>
        <div class="col-md-3">
            <div class="product-card">
                <i class="fa-solid fa-heart heart-icon"></i>
                <img src="{{asset('asset/images/bags/combo bags.jpeg')}}" alt="Gamepad">
                <h5>GP11 Shooter USB Gamepad</h5>
                <p><strong>$550</strong></p>
                <button class="add-to-cart">Add To Cart</button>
            </div>
        </div>
        <div class="col-md-3">
            <div class="product-card">
                <i class="fa-solid fa-heart heart-icon"></i>
                <img src="{{asset('asset/images/bags/Luxury HandbHigh Quality Leather Handbags.jpeg')}}" alt="Quilted Satin Jacket">
                <h5>Quilted Satin Jacket</h5>
                <p><strong>$750</strong></p>
                <button class="add-to-cart">Add To Cart</button>
            </div>
        </div>
    </div>
    <div class="button text-center">
        <a href=""><button class="btn btn-danger my-5 px-5">View more</button></a>
    </div>
</div>
@endsection -->

@section('shut')
<div class="container mb-5">
    <div class="feshionSuites">
        <img
            src="{{asset('asset/images/collection section/Untitled design.png')}}"
            alt=""
            class=" w-100" />
        <div class="feshionSuites-discount">
            <h2 class="text-white">10% discount of your first order! </h2>
            <p class="text-white">Please register your email and get your discount code.</p>

            <div class="mb-3 input-group w-50 text-center discountEmail">
            </div>
        </div>

    </div>
</div>
@endsection

@section('services')
<div class="cutomerSupport my-5">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-4 text-center">
                <i class="fa-solid fa-sack-dollar"></i>
                <h3>Money Back Guarantee</h3>
                <p>We source the finest materials and work with skilled artisans to create products that last.</p>
            </div>
            <div class="col-md-4 text-center">
                <i class="fa-solid fa-truck"></i>
                <h3>Services</h3>
                <p>We are committed to reducing our environmental impact through eco-friendly practices.</p>
            </div>
            <div class="col-md-4 text-center">
                <i class="fa-solid fa-headset"></i>
                <h3>24/7 Support</h3>
                <p>Your happiness is our priority. We offer easy returns, fast shipping, and exceptional customer service.</p>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="bootstrap.js"></script>
@endpush