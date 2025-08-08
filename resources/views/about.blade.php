@extends('layouts.app')


@section('title', 'Contact Us') {{-- Optional: Sets the page title --}}

@section('content')
<!-- Breadcrumb -->
<div class="container my-5">
    <p><a href="/home">Home</a> / About</p>
</div>

<!-- About Section -->
<div class="container about-container">
    <div class="row">
        <div class="col-md-6">
            <h2>Our Story</h2>
            <p>Launched in 2015, Exclusive is South Asia’s premier online shopping marketplace with an active presence in Bangladesh. Supported by a wide range of tailored marketing, data, and service solutions, Exclusive has 10,500 sellers and 300 brands and serves 3 million customers across the region.</p>
            <p>Exclusive has more than 1 Million products to offer, growing at a very fast pace. Exclusive offers a diverse assortment in categories ranging from consumer products.</p>
        </div>
        <div class="col-md-6">
            <img src="{{asset('asset/images/about/young-african-ladies-viewing-something-mobile-phone-while-carrying-shopping-bags.jpg')}}" alt="About Image" class="img-fluid">
        </div>
    </div>
</div>

<!-- Statistics Section -->
<div class="container my-5">
    <div class="row text-center">
        <div class="col-md-3 ">
            <div class="stats-box">
                <i class="fas fa-store fa-2x"></i>
                <h4>10.5k</h4>
                <p>Sellers active on our site</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-box highlighted">
                <i class="fas fa-chart-line fa-2x"></i>
                <h4>33k</h4>
                <p>Monthly Product Sale</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-box">
                <i class="fas fa-users fa-2x"></i>
                <h4>45.5k</h4>
                <p>Customers active on our site</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-box">
                <i class="fas fa-dollar-sign fa-2x"></i>
                <h4>25k</h4>
                <p>Annual gross sales</p>
            </div>
        </div>
    </div>
</div>

<!-- Team Section -->
<div class="container my-5">
    <div class="row">
        <div class="col-md-4 team-member">
            <img src="{{asset('asset/images/about/female-formal.jpg')}}" alt="Tom Cruise">
            <h5>Tom Cruise</h5>
            <p>Founder & Chairman</p>
            <p><i class="fab fa-twitter"></i> <i class="fab fa-instagram"></i> <i class="fab fa-linkedin"></i></p>
        </div>
        <div class="col-md-4 team-member">
            <img src="{{asset('asset/images/about/female-forrmal2.jpg')}}" alt="Emma Watson">
            <h5>Emma Watson</h5>
            <p>Managing Director</p>
            <p><i class="fab fa-twitter"></i> <i class="fab fa-instagram"></i> <i class="fab fa-linkedin"></i></p>
        </div>
        <div class="col-md-4 team-member">
            <img src="{{asset('asset/images/about/formal-male.jpg')}}" alt="Will Smith">
            <h5>Will Smith</h5>
            <p>Product Designer</p>
            <p><i class="fab fa-twitter"></i> <i class="fab fa-instagram"></i> <i class="fab fa-linkedin"></i></p>
        </div>
    </div>
</div>

<!-- cutomer support  -->

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