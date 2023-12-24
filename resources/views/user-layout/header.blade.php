<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('user-home') }}">Flowers-2me</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="{{ route('user-home') }}" class="nav-link"
                        style="font-weight: bold;">Home</a>
                </li>
                <li class="nav-item"><a href="{{ route('about.index') }}" class="nav-link" style="font-weight: bold;">About</a></li>
                <li class="nav-item"><a href="{{ route('contact-us.index') }}" class="nav-link" style="font-weight: bold;">Contact</a></li>
                <li class="nav-item dropdown hidden">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" style="font-weight: bold;">Catalog</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <a class="dropdown-item" href="{{ route('carts.index') }}">Cart</a>
                        <a class="dropdown-item" href="{{ route('checkout.index') }}">Checkout</a>
                    </div>
                </li>
                {{-- <li class="nav-item cta cta-colored"><a href="{{ route('carts.index') }}" class="nav-link"><span
                    class="icon-shopping_cart"></span>[0]</a>
                </li> --}}


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" style="font-weight: bold;">User</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>

                    </div>
                </li>
                <li class="nav-item cta cta-colored">
                    <a href="{{ route('carts.index') }}" class="nav-link">
                        <span class="icon-shopping_cart" style="font-size: 30px;"></span>{{ $cartItemCount }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
