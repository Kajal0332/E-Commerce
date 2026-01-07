<!-- Navbar -->
 <?php
    use App\Models\Cart;
    use App\Models\Wishlist;
    use Illuminate\Support\Facades\Auth;
    
    $total = 0;
    if (Auth::check()) {
        // reflect total quantity in cart (sum of quantities)
        $total = Cart::where('user_id', Auth::id())->sum('quantity');
    }
    $totalWishlist = 0;
    if (Auth::check()) {
        $totalWishlist = Wishlist::where('user_id', Auth::id())->count();
    }
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">ECom.</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact">Contact</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="/categories" id="navbarDropdown" role="button" >
                        Categories
                    </a>
                </li>
                </li>
                {{-- Start of conditional display for SignUp --}}
                @guest
                <li class="nav-item"><a class="nav-link " href="{{ route('register') }}">SignUp</a></li>
                @endguest
                {{-- End of conditional display for SignUp --}}
            </ul>
            
            <form class="d-flex" action="/searchPage">
                    <div class="input-group">
                    <input class="form-control searchBox" name="query" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-dark" type="submit">Search</button>
                </div>
                </form>

            <ul class="navbar-nav mx-3 mb-2 mb-lg-0 " >
                
            </ul>
            {{-- resources/views/layouts/app.blade.php (or your navbar partial) --}}

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0"> {{-- Adjust these classes based on your actual nav structure --}}
                
                    <li class="nav-item ">
                        <div class="d-flex">
                            <a href="/cartlist" class="btn btn-outline-dark position-relative">
                                <i class="fas fa-shopping-bag"></i>
                                <span id="cart-count" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{ $total }}</span>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item ps-3 me-3">
                        <div class="d-flex">
                            <a href="/wishlist" class="btn btn-outline-dark position-relative">
                                <i class="fas fa-heart like-icon"></i>
                                <span id="wishlist-count" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{ $totalWishlist }}</span>
                            </a>
                        </div>
                    </li>


                <!-- @auth
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
                @endauth -->
                @guest
                    <a class="nav-link text-dark mx-2" href="{{ route('login') }}"><i class="fa-solid fa-user fs-5"></i></a>
                @else
                    <li class="nav-item ps-3 me-3">
                        <div class="d-flex">
                        <a id="navbarDropdown" class="nav-link text-dark dropdown-toggle" href="{{ Auth::user()->role === 'admin' ? route('adminDeshboard') : route('home') }}" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
