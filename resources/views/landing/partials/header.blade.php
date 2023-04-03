<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

        <!-- Uncomment below if you prefer to use an image logo -->
        <div class="logo">
            <img src="assets/img/clients/client-1.png" alt="">
            <span class="fs-1 text-primary">Tiesky</span> Cahaya Mandiri
        </div>
        {{-- <h1 class="logo"><a href="index.html"></a></h1> --}}

        <nav id="navbar" class="navbar">
            <ul>
                {{-- {{ dd(Request::is('katalog') ? 'active' : '') }} --}}
                <li><a class="nav-link scrollto {{ Request::is('/') || Request::is('home') ? 'active' : '' }}"
                        href="/home">Home</a></li>
                <li><a class="nav-link scrollto {{ Request::is('about-us') ? 'active' : '' }}" href="/about-us">About
                        us</a></li>
                <li><a class="nav-link scrollto {{ Request::is('katalog') ? 'active' : '' }}" href="/katalog">Produk</a>
                </li>
                <li><a class="nav-link scrollto {{ Request::is('kontak') ? 'active' : '' }}" href="/kontak">Kontak</a>
                </li>
                {{-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="#">Drop Down 1</a></li>
            <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
              <ul>
                <li><a href="#">Deep Drop Down 1</a></li>
                <li><a href="#">Deep Drop Down 2</a></li>
                <li><a href="#">Deep Drop Down 3</a></li>
                <li><a href="#">Deep Drop Down 4</a></li>
                <li><a href="#">Deep Drop Down 5</a></li>
              </ul>
            </li>
            <li><a href="#">Drop Down 2</a></li>
            <li><a href="#">Drop Down 3</a></li>
            <li><a href="#">Drop Down 4</a></li>
          </ul>
        </li> --}}
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header>
<!-- End Header -->
