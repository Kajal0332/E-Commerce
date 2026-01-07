@extends('layouts.app')

@section('content')
<div class="container product-card-section">
    <h2 class="fw-bold slideBodeRed my-5">All Products</h2>
    <div class="row mt-4">
        @forelse ($products as $product)
        <div class="col-md-3 mb-4">
            <div class="product-card">
                    <a href="{{ route('productDetail', $product->id) }}" class="text-decoration-none text-dark">
                    @php
                    $imgSrc = filter_var($product->image, filter: FILTER_VALIDATE_URL) ? $product->image : ($product->image ? asset('storage/'.$product->image) : asset('images/placeholder.png'));
                    @endphp
                    <img src="{{ $imgSrc }}" alt="{{ $product->product_name }}">
                    <h5 class="mt-3">{{ $product->product_name }}</h5>
                    <p><strong>{{ $product->price }}</strong></p>
                    <div class="d-grid gap-2">
                        @if(isset($cartIds) && in_array($product->id, $cartIds))
                            <button class="btn btn-success w-100" disabled>Added</button>
                        @else
                            <form class="cart-form" action="{{route('cartPage')}}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button class="btn btn-dark w-100">Add to Cart</button>
                            </form>
                        @endif

                        <form class="wishlist-form" action="{{ route('wish_list') }}" method="POST" data-product-id="{{ $product->id }}">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit" class="btn btn-link wishlist-btn p-0 m-0" onclick="event.stopPropagation();">
                                <i class="fa-solid fa-heart heart-icon {{ (isset($wishlistIds) && in_array($product->id, $wishlistIds)) ? 'liked' : '' }}" aria-hidden="true"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </a>
        </div>
        @empty
        <div class="col-12">
            <p>No products found.</p>
        </div>
        @endforelse
    </div>

    <div class="divider"></div>
    <div class="d-flex items-center justify-between flex-wrap gap10 wgp-pegination">
        {{ $products->links('pagination::bootstrap-5') }}
    </div>
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

    document.querySelectorAll('.cart-form').forEach(function (form) {
        form.addEventListener('submit', async function (e) {
            e.preventDefault();
            const btn = form.querySelector('button');
            const fd = new FormData(form);
            try {
                const res = await fetch(form.action, {
                    method: 'POST',
                    headers: { 'X-Requested-With': 'XMLHttpRequest' },
                    body: fd
                });
                if (res.status === 201 || res.status === 200) {
                    try {
                        const data = await res.json();
                        if (data && typeof data.cart_total !== 'undefined' && document.getElementById('cart-count')) {
                            document.getElementById('cart-count').textContent = data.cart_total;
                        }
                    } catch (err) {}
                    btn.classList.remove('btn-dark');
                    btn.classList.add('btn-success');
                    btn.textContent = 'Added';
                    btn.disabled = true;
                } else if (res.status === 401) {
                    window.location.href = '/login';
                } else {
                    alert('Could not add to cart');
                }
            } catch (err) {
                console.error(err);
                alert('Could not add to cart');
            }
        });
    });
});
</script>
<style>
.heart-icon.liked { color: #e0245e; }
</style>
@endpush

@endsection