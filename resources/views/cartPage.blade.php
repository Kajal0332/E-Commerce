@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2>Your Shopping Cart</h2>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @if(isset($cartItems) && $cartItems->count())
                @foreach($cartItems as $details)
                    <tr data-cart-id="{{ $details->cart_id }}">
                        <td>
                            <img src="{{ $details->image }}" width="50" height="50" class="me-2">
                            {{ $details->product_name }}
                        </td>
                        <td class="price">${{ number_format($details->price, 2) }}</td>
                        <td>
                            <div class="input-group" style="width:140px">
                                <button class="btn btn-outline-secondary qty-decrease" type="button">-</button>
                                <input type="text" class="form-control text-center qty-input" value="{{ $details->quantity }}" style="max-width:60px">
                                <button class="btn btn-outline-secondary qty-increase" type="button">+</button>
                            </div>
                        </td>
                        <td class="line-total">${{ number_format($details->price * $details->quantity, 2) }}</td>
                        <td>
                            <button class="btn btn-sm btn-danger remove-cart" data-cart-id="{{ $details->cart_id }}">Remove</button>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr><td colspan="5" class="text-center">Your cart is empty!</td></tr>
            @endif
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" class="text-end"><strong>Total Amount:</strong></td>
                <td colspan="2" class="text-start"><strong>$<span id="cart-subtotal-footer">{{ number_format($subtotal ?? 0, 2) }}</span></strong></td>
            </tr>
        </tfoot>
    </table>
    <div class="text-end mb-4">
        <h4>Subtotal: $<span id="cart-subtotal">{{ number_format($subtotal ?? 0, 2) }}</span></h4>
    </div>
    <div class="text-end">
        <form action="{{ route('checkout') }}"  method="GET">
            @csrf
            <button class="btn btn-success px-5">Checkout</button>
        </form>
    </div>

    <script>
        (function(){
            const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            function updateCart(cartId, quantity, row) {
                fetch("{{ route('cart.update') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrf,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ cart_id: cartId, quantity: quantity })
                }).then(r => r.json()).then(data => {
                    if (data.status === 'updated') {
                        // update line total and subtotal
                        const price = parseFloat(row.querySelector('.price').textContent.replace('$',''));
                        row.querySelector('.line-total').textContent = '$' + (price * data.quantity).toFixed(2);
                        document.getElementById('cart-subtotal').textContent = parseFloat(data.subtotal).toFixed(2);                        document.getElementById('cart-subtotal-footer').textContent = parseFloat(data.subtotal).toFixed(2);
                        // update navbar badge if present
                        if (typeof data.cart_total !== 'undefined' && document.getElementById('cart-count')) {
                            document.getElementById('cart-count').textContent = data.cart_total;
                        }                        row.querySelector('.qty-input').value = data.quantity;
                    } else {
                        alert('Unable to update quantity');
                    }
                }).catch(() => alert('Network error'));
            }

            function removeCart(cartId, row) {
                fetch("{{ route('cart.remove') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrf,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ cart_id: cartId })
                }).then(r => r.json()).then(data => {
                    if (data.status === 'removed') {
                        row.remove();
                        document.getElementById('cart-subtotal').textContent = parseFloat(data.subtotal).toFixed(2);
                        // if no rows left show empty
                        if (!document.querySelector('tbody tr')) {
                            const tbody = document.querySelector('tbody');
                            tbody.innerHTML = '<tr><td colspan="5" class="text-center">Your cart is empty!</td></tr>';
                        }
                    } else {
                        alert('Unable to remove item');
                    }
                }).catch(() => alert('Network error'));
            }

            document.querySelectorAll('.qty-increase').forEach(btn => {
                btn.addEventListener('click', function(){
                    const row = this.closest('tr');
                    const cartId = row.getAttribute('data-cart-id');
                    const input = row.querySelector('.qty-input');
                    let q = parseInt(input.value) || 1;
                    q = q + 1;
                    updateCart(cartId, q, row);
                });
            });

            document.querySelectorAll('.qty-decrease').forEach(btn => {
                btn.addEventListener('click', function(){
                    const row = this.closest('tr');
                    const cartId = row.getAttribute('data-cart-id');
                    const input = row.querySelector('.qty-input');
                    let q = parseInt(input.value) || 1;
                    if (q <= 1) return; // don't allow below 1
                    q = q - 1;
                    updateCart(cartId, q, row);
                });
            });

            document.querySelectorAll('.qty-input').forEach(input => {
                input.addEventListener('change', function(){
                    const row = this.closest('tr');
                    const cartId = row.getAttribute('data-cart-id');
                    let q = parseInt(this.value) || 1;
                    if (q < 1) q = 1;
                    updateCart(cartId, q, row);
                });
            });

            document.querySelectorAll('.remove-cart').forEach(btn => {
                btn.addEventListener('click', function(){
                    const row = this.closest('tr');
                    const cartId = this.getAttribute('data-cart-id');
                    if (!confirm('Remove this item from cart?')) return;
                    removeCart(cartId, row);
                });
            });
        })();
    </script>
</div>
@endsection
