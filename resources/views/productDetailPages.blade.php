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
                @if(isset($cartIds) && in_array($product->id, $cartIds))
                    <button class="btn btn-success btn-lg py-3 w-100" disabled>Added</button>
                @else
                    <form class="cart-form" action="{{route('cartPage')}}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                        <button class="btn btn-dark btn-lg py-3 w-100">Add to Cart</button>
                    </form>
                @endif

                <form class="wishlist-form" action="{{route('wish_list')}}" method="POST" data-product-id="{{ $product->id }}">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                    <button type="submit" class="btn {{ (isset($wishlistIds) && in_array($product->id, $wishlistIds)) ? 'btn-danger' : 'btn-outline-secondary' }} btn-lg w-100">{{ (isset($wishlistIds) && in_array($product->id, $wishlistIds)) ? 'In Wishlist' : 'Add to Wishlist' }}</button>
                </form>

                <button class="btn btn-outline-danger btn-lg">Buy Now</button>
            </div>
            
            <p class="mt-4 small text-muted"><i class="fa-solid fa-truck"></i> Free delivery on orders over $50.00</p>
        </div>
    </div>
</div>
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Wishlist ajax
    document.querySelectorAll('.wishlist-form').forEach(function (form) {
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
                if (res.status === 200 || res.status === 201) {
                    // toggle states
                    if (btn.classList.contains('btn-danger')) {
                        btn.classList.remove('btn-danger');
                        btn.classList.add('btn-outline-secondary');
                        btn.textContent = 'Add to Wishlist';
                    } else {
                        btn.classList.remove('btn-outline-secondary');
                        btn.classList.add('btn-danger');
                        btn.textContent = 'In Wishlist';
                    }
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
    });

    // Cart ajax
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
                    // parse json if available to update badge
                    try {
                        const data = await res.json();
                        if (data && typeof data.cart_total !== 'undefined' && document.getElementById('cart-count')) {
                            document.getElementById('cart-count').textContent = data.cart_total;
                        }
                    } catch (err) {
                        // ignore parse errors
                    }
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
@endpush

@endsection