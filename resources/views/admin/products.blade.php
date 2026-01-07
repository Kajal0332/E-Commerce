@extends('admin.showAdminpage')

@section('rightSideNavbar')
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Products</li>
            </ol>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group input-group-outline">
                    <label class="form-label">Type here...</label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <ul class="navbar-nav d-flex align-items-center  justify-content-end">
                <li class="nav-item d-flex align-items-center">
                    <a class="btn btn-outline-primary btn-sm mb-0 me-3" target="_blank" href="https://www.creative-tim.com/builder?ref=navbar-material-dashboard">Online Builder</a>
                </li>
                <li class="mt-1">
                    <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/material-dashboard on GitHub">Star</a>
                </li>
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </li>
                <li class="nav-item px-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0">
                        <i class="material-symbols-rounded fixed-plugin-button-nav">settings</i>
                    </a>
                </li>
                <li class="nav-item dropdown pe-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="material-symbols-rounded">notifications</i>
                    </a>
                    <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                        <li class="mb-2">
                            <a class="dropdown-item border-radius-md" href="javascript:;">
                                <div class="d-flex py-1">
                                    <div class="my-auto">
                                        <img src="../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                            <span class="font-weight-bold">New message</span> from Laur
                                        </h6>
                                        <p class="text-xs text-secondary mb-0">
                                            <i class="fa fa-clock me-1"></i>
                                            13 minutes ago
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a class="dropdown-item border-radius-md" href="javascript:;">
                                <div class="d-flex py-1">
                                    <div class="my-auto">
                                        <img src="../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  me-3 ">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                            <span class="font-weight-bold">New album</span> by Travis Scott
                                        </h6>
                                        <p class="text-xs text-secondary mb-0">
                                            <i class="fa fa-clock me-1"></i>
                                            1 day
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item border-radius-md" href="javascript:;">
                                <div class="d-flex py-1">
                                    <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                                        <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>credit-card</title>
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                                    <g transform="translate(1716.000000, 291.000000)">
                                                        <g transform="translate(453.000000, 454.000000)">
                                                            <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                                            <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                            Payment successfully completed
                                        </h6>
                                        <p class="text-xs text-secondary mb-0">
                                            <i class="fa fa-clock me-1"></i>
                                            2 days
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item d-flex align-items-center">
                    <a href="../pages/sign-in.html" class="nav-link text-body font-weight-bold px-0">
                        <i class="material-symbols-rounded">account_circle</i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
@endsection
@section('endNavbarContent')
<button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#productModal" id="addNewProductBtn">
    Add New Product
</button>

@if(session('success'))
<div class="alert alert-success mt-2">{{ session('success') }}</div>
@endif
@if($errors->any())
<div class="alert alert-danger mt-2">
    <ul class="mb-0">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<!-- Products Table -->
<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Category</th>
                <th>Description</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody id="productTableBody">
            @foreach($products as $product)
            <tr>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    @php
                        $imgSrc = filter_var($product->image, FILTER_VALIDATE_URL) ? $product->image : ($product->image ? asset('storage/'.$product->image) : asset('images/placeholder.png'));
                    @endphp
                    <img src="{{ $imgSrc }}" alt="Image" style="width: 50px; height: 50px; object-fit: cover;">
                </td>
                <td>{{ $product->category }}</td>
                <td class="text-wrap" style="max-width: 200px">{{ $product->description }}</td>
                <td class="text-center">

                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this product?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            <!-- Products will be dynamically added here -->
        </tbody>
    </table>
</div>

</div>
<!-- Modal Structure -->
<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel">Add New Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Product Form -->
                <form id="productForm" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="mb-3">
                        <label for="productName" class="form-label">Product Name</label>
                        <input type="text" class="form-control border" id="productName" name="product_name" value="{{ old('product_name') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="productPrice" class="form-label">Price</label>
                        <input type="number" step="0.01" class="form-control border" id="productPrice" name="price" value="{{ old('price') }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Product Image</label>
                        <div class="mb-2">
                            <input type="file" class="form-control border-3" id="productImageFile" name="image_file" accept="image/*">
                            <small class="text-muted">Upload an image file (preferred).</small>
                        </div>
                        <div>
                            <input type="url" class="form-control border" id="productImageUrl" name="image_url" placeholder="Or provide an image URL" value="{{ old('image_url') }}">
                            <small class="text-muted">Or provide an image URL.</small>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="productCategory" class="form-label">Category</label>
                        <select class="form-select border" id="productCategory" name="category" required>
                            <option selected disabled value="">Choose...</option>
                            <option {{ old('category') == 'Electronics' ? 'selected' : '' }}>Electronics</option>
                            <option {{ old('category') == 'Apparel' ? 'selected' : '' }}>Apparel</option>
                            <option {{ old('category') == 'Books' ? 'selected' : '' }}>Books</option>
                            <option {{ old('category') == 'Home & Kitchen' ? 'selected' : '' }}>Home & Kitchen</option>
                            <option {{ old('category') == 'Indian Suit' ? 'selected' : '' }}>Indian Suit</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="productDescription" class="form-label border">Description</label>
                        <textarea class="form-control border" id="productDescription" name="description" rows="3">{{ old('description') }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Save Product</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection