@extends('layouts.app')
@section('content')
<div class="container product-card-section">
    <h2 class="fw-bold slideBodeRed my-5">Categories</h2>
    <div class="row mt-4">
        @foreach ($categories as $category)
        <div class="col-md-3 mb-4">
            <a href="{{ url('category/'.$category->id) }}" class="text-decoration-none text-dark">
                <div class="product-card">
                    @php
                        $imgSrc = filter_var($category->image, FILTER_VALIDATE_URL) ? $category->image : ($category->image ? asset('images/categories/'.$category->image) : asset('images/placeholder.png'));
                    @endphp
                    <img src="{{ $imgSrc }}" alt="{{ $category->category_name }}">
                    <h5 class="mt-3">{{ $category->category_name }}</h5>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>

@if(isset($products) && $products->count())
<div class="container product-card-section mt-5">
    <h2 class="fw-bold slideBodeRed my-5">Products in {{ $category->category_name ?? 'Category' }}</h2>
    <div class="row mt-4">
        @foreach($products as $product)
        <div class="col-md-3 mb-4">
            <a href="{{ route('productDetail', $product->id) }}" class="text-decoration-none text-dark product-link">
                <div class="product-card">
                    <form class="wishlist-form" action="{{ route('wish_list') }}" method="POST" data-product-id="{{ $product->id }}">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="btn btn-link wishlist-btn p-0 m-0" onclick="event.stopPropagation();">
                            <i class="fa-solid fa-heart heart-icon" aria-hidden="true"></i>
                        </button>
                    </form>
                    @php
                        $imgSrc = filter_var($product->image, FILTER_VALIDATE_URL) ? $product->image : ($product->image ? asset('storage/'.$product->image) : asset('images/placeholder.png'));
                    @endphp
                    <img src="{{ $imgSrc }}" alt="{{ $product->product_name }}">
                    <h5 class="mt-3">{{ $product->product_name }}</h5>
                </div>
            </a>
        </div>
        @endforeach
    </div>

    <div class="divider"></div>
    <div class="d-flex items-center justify-between flex-wrap gap10 wgp-pegination">
        {{ $products->links('pagination::bootstrap-5') }}
    </div>
</div>
@endif

<div class="divider"></div>
    <div class="d-flex items-center justify-between flex-wrap gap10 wgp-pegination">
        {{ $categories->links('pagination::bootstrap-5') }}
    </div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.wishlist-form').forEach(function (form) {
        form.addEventListener('submit', async function (e) {
            e.preventDefault();
            const icon = form.querySelector('.heart-icon');
            const fd = new FormData(form);
            try {
                const res = await fetch(form.action, {
                    method: 'POST',
                    headers: { 'X-Requested-With': 'XMLHttpRequest' },
                    body: fd
                });
                if (res.status === 200 || res.status === 201) {
                    icon.classList.toggle('liked');
                } else if (res.status === 401) {
                    window.location.href = '/login';
                } else {
                    alert('Could not add to wishlist');
                }
            } catch (err) {
                console.error(err);
                alert('Could not add to wishlist');
            }
        });
        form.addEventListener('click', function (e) { e.stopPropagation(); });
    });
});
</script>
<style>
.heart-icon.liked { color: #e0245e; }
</style>
@endpush

@endsection