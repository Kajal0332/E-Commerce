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
        <div class="col-md-3">
            <div class="product-card">
                <span class="discount-badge">-35%</span>
                <div class="inline">
                    <i class="fa-solid fa-heart heart-icon add-to-wishlist"></i>
                </div>
                <img
                    src="{{asset('asset/images/bags/Bayan Kıyafet Kombinleri.jpeg')}}"
                    alt="Gucci duffle bag" />
                <h5>Gucci duffle bag</h5>
                <p><s>$1160</s> <strong>$960</strong></p>
                <button
                    class="add-to-cart"
                    data-product-id="1"
                    data-product-name="Gucci duffle bag"
                    data-product-price="$960"
                    data-product-image="asset/images/bags/Bayan Kıyafet Kombinleri.jpeg">
                    Add To Cart
                </button>
            </div>
        </div>
        <div class="col-md-3">
            <div class="product-card">
                <i class="fa-solid fa-heart heart-icon add-to-wishlist"></i>
                <img
                    src="{{asset('asset/images/new arrivel/music-headset.png')}}"
                    alt="RGB Liquid CPU Cooler" />
                <h5>black HeadPhone</h5>
                <p><strong>$660</strong></p>
                <button
                    class="add-to-cart"
                    data-product-id="2"
                    data-product-name="black HeadPhone"
                    data-product-price="$660"
                    data-product-image="asset/images/new arrivel/music-headset.png">
                    Add To Cart
                </button>
            </div>
        </div>
        <div class="col-md-3">
            <div class="product-card">
                <i class="fa-solid fa-heart heart-icon add-to-wishlist"></i>
                <img src="{{asset('asset/images/new arrivel/black sandel.jpeg')}}" alt="Gamepad" />
                <h5>Black Sandel</h5>
                <p><strong>$750</strong></p>
                <button
                    class="add-to-cart"
                    data-product-id="3"
                    data-product-name="Black Sandel"
                    data-product-price="$750"
                    data-product-image="asset/images/new arrivel/black sandel.jpeg">
                    Add To Cart
                </button>
            </div>
        </div>
        <div class="col-md-3">
            <div class="product-card">
                <i class="fa-solid fa-heart heart-icon add-to-wishlist"></i>
                <img
                    src="{{asset('asset/images/new arrivel/blue winter jedcket.jpeg')}}"
                    alt="Quilted Satin Jacket" />
                <h5>Quilted Satin Jacket</h5>
                <p><strong>$750</strong></p>
                <button
                    class="add-to-cart"
                    data-product-id="4"
                    data-product-name="Quilted Satin Jacket"
                    data-product-price="$750"
                    data-product-image="imges/new arrivel/blue winter jedcket.jpeg">
                    Add To Cart
                </button>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-3">
            <div class="product-card">
                <span class="discount-badge">-35%</span>
                <i class="fa-solid fa-heart heart-icon"></i>
                <img src="imges/new arrivel/morden top.jpeg" alt="Gucci duffle bag">
                <h5>Morden top</h5>
                <p><strong>$960</strong></p>
                <button class="add-to-cart">Add To Cart</button>
            </div>
        </div>
        <div class="col-md-3">
            <div class="product-card">
                <i class="fa-solid fa-heart heart-icon"></i>
                <img src="imges/new arrivel/Sweatshirt Jacket Coat.jpeg" alt="RGB Liquid CPU Cooler">
                <h5>RGB Liquid CPU Cooler</h5>
                <p><strong>$1960</strong></p>
                <button class="add-to-cart">Add To Cart</button>
            </div>
        </div>
        <div class="col-md-3">
            <div class="product-card">
                <i class="fa-solid fa-heart heart-icon"></i>
                <img src="imges/bags/combo bags.jpeg" alt="Gamepad">
                <h5>GP11 Shooter USB Gamepad</h5>
                <p><strong>$550</strong></p>
                <button class="add-to-cart">Add To Cart</button>
            </div>
        </div>
        <div class="col-md-3">
            <div class="product-card">
                <i class="fa-solid fa-heart heart-icon"></i>
                <img src="imges/new arrivel/pink saree.jpeg" alt="Quilted Satin Jacket">
                <h5>Quilted Satin Jacket</h5>
                <p><strong>$450</strong></p>
                <button class="add-to-cart">Add To Cart</button>
            </div>
        </div>
    </div>
    <div class="button text-center">
        <a href=""><button class="btn btn-danger my-5 px-5">View more</button></a>
    </div>
</div>
@endsection

@section('cartgeories')
<div class="mb-5 container">
    <h2 class="fw-bold slideBodeRed my-5">Categories</h2>
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-2 women-cloths-category">
                <img src="imges/new arrivel/Kurti set.jpeg" alt="" />
                <p class="px-4">Kurti</p>
            </div>
            <div class="col-md-2 women-cloths-category">
                <img src="imges/new arrivel/Briide pink lehenga.jpeg" alt="" />
                <p class="px-4">Lehenga</p>
            </div>
            <div class="col-md-2 women-cloths-category">
                <img src="imges/new arrivel/wide jeans.jpeg" alt="" />
                <p class="px-4">Jeans</p>
            </div>
            <div class="col-md-2 women-cloths-category">
                <img src="imges/new arrivel/morden top.jpeg" alt="" />
                <p class="px-4">Morden tops</p>
            </div>
            <div class="col-md-2 women-cloths-category">
                <img src="imges/new arrivel/pink saree.jpeg" alt="" />
                <p class="px-4">Saree</p>
            </div>
            <div class="col-md-2 women-cloths-category">
                <img src="imges/new arrivel/gym.jpeg" alt="" />
                <p class="px-4">GYM</p>
            </div>
            <div class="col-md-2 women-cloths-category">
                <img src="imges/new arrivel/goldenshoes.jpeg" alt="" />
                <p class="px-4">shoes</p>
            </div>
            <div class="col-md-2 women-cloths-category">
                <img src="imges/new arrivel/bags.jpeg" alt="" />
                <p class="px-4">Bags</p>
            </div>
            <div class="col-md-2 women-cloths-category">
                <img src="imges/new arrivel/music-headset.png" alt="" />
                <p class="px-4">Music</p>
            </div>
            <div class="col-md-2 women-cloths-category">
                <img src="imges/new arrivel/books.jpg" alt="" />
                <p class="px-4">Books</p>
            </div>
            <div class="col-md-2 women-cloths-category">
                <img src="imges/new arrivel/makeup.png" alt="" />
                <p class="px-4">Makeup</p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('bags')
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
@endsection

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