@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="fw-bold mb-4">My Wishlist</h2>
    <div id="wishlist-container" class="row">
        <div class="row mt-4">
            @if(isset($wishlistItems) && $wishlistItems->count())
            @foreach ($wishlistItems as $item)
            <div class="col-md-3">
                <div class="product-card">
                    @php
                        $imgSrc = filter_var($item->image, FILTER_VALIDATE_URL) ? $item->image : ($item->image ? asset('storage/'.$item->image) : asset('images/placeholder.png'));
                    @endphp
                    <img src="{{ $imgSrc }}" alt="{{ $item->product_name }}">
                    <h5>Item: {{ $item->product_name }}</h5>
                    <p><strong>${{ $item->price }}</strong></p>
                    <div class="d-grid gap-2">
                        @if(isset($cartIds) && in_array($item->id, $cartIds))
                            <button class="btn btn-success w-100" disabled>Added</button>
                        @else
                            <form class="cart-form" action="{{route('cartPage')}}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $item->id }}">
                                <button class="btn btn-dark w-100">Add to Cart</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
            @else
                <div class="col-12 text-center py-4">Your wishlist is empty!</div>
            @endif

                        <form class="wishlist-form" action="{{ route('wish_list') }}" method="POST" data-product-id="{{ $item->id }}">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $item->id }}">
                            <button type="submit" class="btn btn-link wishlist-btn p-0 m-0" onclick="event.stopPropagation();">
                                <i class="fa-solid fa-heart heart-icon {{ (isset($wishlistIds) && in_array($item->id, $wishlistIds)) ? 'liked' : '' }}" aria-hidden="true"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
            @else
                <div class="col-12 text-center py-4">Your wishlist is empty!</div>
            @endif
        </div>
        <p id="empty-wishlist-message" class="text-center" style="display: none;">Your wishlist is empty.</p>
    </div>
    <script>
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
    </script>
    @endsection