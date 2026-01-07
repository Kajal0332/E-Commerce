@extends('admin.showAdminpage')

@section('rightSideNavbar')
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:void(0);">Pages</a></li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Categories</li>
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
                    <a href="javascript:void(0);" class="nav-link text-body p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </li>
                <li class="nav-item px-3 d-flex align-items-center">
                    <a href="javascript:void(0);" class="nav-link text-body p-0">
                        <i class="material-symbols-rounded fixed-plugin-button-nav">settings</i>
                    </a>
                </li>
                <li class="nav-item dropdown pe-3 d-flex align-items-center">
                    <a href="javascript:void(0);" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="material-symbols-rounded">notifications</i>
                    </a>
                    <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                        <li class="mb-2">
                            <a class="dropdown-item border-radius-md" href="javascript:void(0);">
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
                            <a class="dropdown-item border-radius-md" href="javascript:void(0);">
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
                            <a class="dropdown-item border-radius-md" href="javascript:void(0);">
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
<button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#categoryModal" id="addNewCategoryBtn">
    Add New Category
</button>
<!-- Modal Structure -->
<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="categoryModalLabel">Add New Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Product Form -->
                <form id="categoryForm" action="{{ route('addCategory.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="categoryName" class="form-label">Category Name</label>
                        <input type="text" class="form-control border" id="categoryName" name="category_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="categorySlug" class="form-label">Slug</label>
                        <input type="text" class="form-control border" id="categorySlug" name="slug" required readonly>
                    </div>
                    <div class="mb-3">
                        <label for="categoryImgFile" class="form-label">Upload Image</label>
                        <input type="file" class="form-control border" id="categoryImgFile" name="image" accept="image/*">
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Save Category</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Category Table -->
<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Image</th>
                <th>Category Name</th>
                <th>slug</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody id="categoryTableBody">
          @foreach ($categories as $category)
            <tr>
              <td>{{ $category->id }}</td>
              <td>
                @php
                  $imgSrc = filter_var($category->image, FILTER_VALIDATE_URL) ? $category->image : ($category->image ? asset('images/categories/'.$category->image) : asset('images/placeholder.png'));
                @endphp
                <img src="{{ $imgSrc }}" class="brand_image" alt="{{ $category->category_name }}">
                
              </td>
              <td>{{ $category->category_name }}</td>
              <td>{{ $category->slug }}</td>
              <td>
                <button type="button"
                        class="btn btn-sm btn-warning editCategoryBtn m-3"
                        data-bs-toggle="modal"
                        data-bs-target="#editCategoryModal"
                        data-id="{{ $category->id }}"
                        data-name="{{ $category->category_name }}"
                        data-slug="{{ $category->slug }}">
                  Edit
                </button>
                <form action="{{ route('deleteCategory', ['id' => $category->id]) }}" method="POST" style="display:inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
    </table>
    <div class="divider"></div>
      <div class="flex items-center justify-between flex-wrap gap10 mt-4 brand-pagination">
        {{ $categories->links('pagination::bootstrap-5') }}
      </div>
</div>
<!-- Edit Category Modal -->
@isset($category)
<div class="modal fade" id="editCategoryModal" tabindex="1" aria-labelledby="EditCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Category</h5>
                <button type="button" class="edit-btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('updateCategory') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $category->id }}">
                    <div class="mb-3">
                        <label for="categoryNameEdit" class="form-label">Category Name</label>
                        <input type="text" class="form-control border" id="categoryNameEdit" name="category_name" value="{{ $category->category_name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="categorySlugEdit" class="form-label">Slug</label>
                        <input type="text" class="form-control border" id="categorySlugEdit" name="slug" value="{{ $category->slug }}" required readonly>
                    </div>
                    <div class="mb-3">
                        <label for="categoryImgFileEdit" class="form-label">Upload Image</label>
                        <input type="file" class="form-control border" id="categoryImgFileEdit" name="image" value="{{ $category->image }}" accept="image/*">
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Edit Category</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endisset
<script>
    document.getElementById('categoryName').addEventListener('input', function() {
        const name = this.value;
        const slug = name.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
        document.getElementById('categorySlug').value = slug;
    });

    document.querySelectorAll('.editCategoryBtn').forEach(btn => {
      btn.addEventListener('click', () => {
        document.getElementById('categoryNameEdit').value = btn.dataset.name;
        document.getElementById('categorySlugEdit').value = btn.dataset.slug;
        document.querySelector('input[name="id"]').value = btn.dataset.id;
      });
    });
</script>
@endsection