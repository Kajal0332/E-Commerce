@extends('admin.showAdminpage')

@section('rightSideNavbar')
<!-- breadcrumb omitted for brevity -->
@endsection

@section('endNavbarContent')
<div class="container">
    <h3 class="mb-4">Edit Product</h3>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Product Name</label>
            <input type="text" name="product_name" class="form-control" value="{{ old('product_name', $product->product_name) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $product->price) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Current Image</label>
            <div class="mb-2">
                @php
                    $imgSrc = filter_var($product->image, FILTER_VALIDATE_URL) ? $product->image : ($product->image ? asset('storage/'.$product->image) : asset('images/placeholder.png'));
                @endphp
                <img src="{{ $imgSrc }}" alt="current" style="max-width:150px; max-height:150px; object-fit:cover;">
            </div>
            <label class="form-label">Upload New Image</label>
            <input type="file" name="image_file" class="form-control" accept="image/*">
            <small class="text-muted">Or provide an image URL below</small>
            <input type="url" name="image_url" class="form-control mt-2" placeholder="Image URL" value="{{ old('image_url', filter_var($product->image, FILTER_VALIDATE_URL) ? $product->image : '') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Category</label>
            <select name="category" class="form-select" required>
                <option value="" disabled>Choose...</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->category_name }}" {{ old('category', $product->category) == $cat->category_name ? 'selected' : '' }}>{{ $cat->category_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4">{{ old('description', $product->description) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Product</button>
        <a href="{{ route('product') }}" class="btn btn-secondary ms-2">Cancel</a>
    </form>
</div>
@endsection