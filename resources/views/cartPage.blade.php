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
            </tr>
        </thead>
        <tbody>
            @if(Session::has('cart'))
                @foreach($cartItems as $id => $details)
                    <tr>
                        <td>
                            <img src="{{ $details['image'] }}" width="50" height="50" class="me-2">
                            {{ $details['name'] }}
                        </td>
                        <td>${{ $details['price'] }}</td>
                        <td>{{ $details['quantity'] }}</td>
                        <td>${{ $details['price'] * $details['quantity'] }}</td>
                    </tr>
                @endforeach
            @else
                <tr><td colspan="4" class="text-center">Your cart is empty!</td></tr>
            @endif
        </tbody>
    </table>
    <div class="text-end">
        <button class="btn btn-success px-5">Checkout</button>
    </div>
</div>
@endsection