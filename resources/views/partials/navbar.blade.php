<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact  ">Contact</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categories
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Clothes</a></li>
                        <li><a class="dropdown-item" href="#">Bags</a></li>
                        <li><a class="dropdown-item" href="#">Music Products</a></li>
                        <li><a class="dropdown-item" href="#">Shoes</a></li>
                    </ul>
                </li>
                </li>
                {{-- Start of conditional display for SignUp --}}
                @guest
                <li class="nav-item"><a class="nav-link " href="/signup">SignUp</a></li>
                @endguest
                {{-- End of conditional display for SignUp --}}
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-dark" type="submit">Search</button>
            </form>

            <ul class="navbar-nav mx-3 mb-2 mb-lg-0 " >
                
            </ul>
            {{-- resources/views/layouts/app.blade.php (or your navbar partial) --}}

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0"> {{-- Adjust these classes based on your actual nav structure --}}
                
                    <li class="nav-item ">
                        <div class="d-flex">
                            <a href="shopping_cart.html" class="btn btn-outline-dark position-relative">
                                <i class="fas fa-shopping-bag"></i>
                                <span id="wishlist-count" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">0</span>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item ps-3 me-3">
                        <div class="d-flex">
                            <a href="wishlist.php" class="btn btn-outline-dark position-relative">
                                <i class="fas fa-heart like-icon"></i>
                                <span id="cart-count"
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">0</span>
                            </a>
                        </div>
                    </li>


                @auth
                {{-- User is logged in: Show User Icon with Dropdown --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownUser" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{-- Font Awesome User Icon (make sure you have Font Awesome loaded) --}}
                        <i class="fas fa-user-circle"></i> {{ Auth::user()->name }} {{-- Display the logged-in user's name --}}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownUser">
                        <li>
                            <a class="dropdown-item" href="{{ route('profile.show') }}">My Profile</a> {{-- You'll define this route next --}}
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
                @else
                {{-- User is NOT logged in: Show Login Button --}}
                <li class="nav-item">
                    <a class="btn btn-dark" href="{{ route('login') }}">Login</a>
                </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>
