@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="fw-bold mb-4">My Wishlist</h2>
    <div id="wishlist-container" class="row">
    </div>
    <p id="empty-wishlist-message" class="text-center" style="display: none;">Your wishlist is empty.</p>
</div>
@endsection
