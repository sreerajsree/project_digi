<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<!-- Head -->

<head>
    <title>@yield('title', config('app.name'))</title>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="google-site-verification" content="kVCbIFPultFtVw4xdKmZNrtnLhfi45Rt6NC1RGhUadA"  />
    <meta name="referrer" content="no-referrer-when-downgrade">
    <meta name="author" content="Digishaz">
    <meta name="theme-color" content="#000" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="copyright" content="Digishaz {{ now()->year }}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta property="og:locale" content="en_US">
    @yield('meta')
    <link rel="canonical" href="{{ url()->current() }}">
    <!-- Styles -->
    @livewireStyles
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Belanosima&display=swap" rel="stylesheet">
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-VQYTWTP11Y"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-VQYTWTP11Y');
    </script>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-N68RV2X');
    </script>
    <!-- End Google Tag Manager -->
</head>
<!-- /.Head -->

<!-- Body -->

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N68RV2X" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    @include('cookie-consent::index')

    <!-- App -->
    <div id="app">

        <nav>
            <div class="wrapper">
                <div class="logo"><a href="{{ url('/') }}">
                        <img src="{{ asset('images/logo.png') }}" alt="Digishaz Logo">
                    </a></div>
                <input type="radio" name="slider" id="menu-btn">
                <input type="radio" name="slider" id="close-btn">
                <ul class="nav-links">
                    <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
                    <li><a href="/">Home</a></li>
                    <li>
                        <a href="#" class="desktop-item">Categories</a>
                        <input type="checkbox" id="showDrop">
                        <label for="showDrop" class="mobile-item">Categories</label>
                        <ul class="drop-menu">
                            <li>
                                <a href="/news">News</a>
                            </li>
                            <li>
                                <a href="/trending">Trending</a>
                            </li>
                            <li>
                                <a href="/artificial-intelligence">AI</a>
                            </li>
                            <li>
                                <a href="/others">Others</a>
                            </li>
                            <li>
                                <a href="/digital-marketing">Digital Marketing</a>
                            </li>
                            <li>
                                <a href="/social-media">Social Media</a>
                            </li>
                            <li>
                                <a href="/crypto-currency">Cryptocurrency</a>
                            </li>
                        </ul>
                    </li>
                    {{-- <li>
                        <a href="#" class="desktop-item">Categories</a>
                        <input type="checkbox" id="showMega">
                        <label for="showMega" class="mobile-item">Categories</label>
                        <div class="mega-box">
                            <div class="content">
                                <div class="row">
                                    <div class="col-md-4">
                                        <ul class="mega-links">
                                            

                                        </ul>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="mega-links">
                                            

                                        </ul>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="mega-links">
                                          

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li> --}}
                    @guest
                        <li>
                            <a href="{{ route('login') }}">Sign in</a>
                        </li>
                    @endguest
                    @auth
                    <li>
                        <a href="#" class="desktop-item">{{ Auth::user()->name }}</a>
                        <input type="checkbox" id="showDrop">
                        <label for="showDrop" class="mobile-item">{{ Auth::user()->name }}</label>
                        <ul class="drop-menu">
                            <li>
                                <a href="{{ route('logout') }}" class="sub-item"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    <span>Logout</span>
                                </a>
                                <form action="{{ route('logout') }}" method="POST" id="logout-form"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </li>
                            @can('viewAny', \App\Models\Post::class)
                            <li>
                                <a href="/dashboard/posts" class="sub-item">
                                    <span>Dashboard</span>
                                </a>
                            </li>
                        @endcan
                        </ul>
                    </li>
                    @endauth
                    <li>
                        <a href="javascript:void(0)" id="search">
                            <i class="fas fa-search"></i>
                        </a>
                    </li>
                </ul>
                <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
            </div>
        </nav>

        <!-- Main -->
        <main>
            @yield('content')
        </main>
        <!-- /.Main -->

        <!--Footer-->
        <footer>
            <div class="container">
                <div class="footer_wrapper_upper">
                    <div class="footer_about">
                        <div class="logo">
                            <a href="{{ url('/') }}">
                                <img class="mainlogo" src="{{ asset('images/logo.png') }}" alt="Digishaz Logo">
                            </a>
                            <p class="about">DIGISHAZ is an exceptional team of individuals dedicated to curating and
                                answering tech-related questions sourced from Google users worldwide.</p>
                        </div>
                    </div>
                    <div class="footer_links">
                        <p>Categories</p>
                        <ul>
                            <li>
                                <a href="/news">News</a>
                            </li>
                            <li>
                                <a href="/trending">Trending</a>
                            </li>
                            <li>
                                <a href="/digital-marketing">Digital Marketing</a>
                            </li>
                            <li>
                                <a href="/crypto-currency">Cryptocurrency</a>
                            </li>
                            <li>
                                <a href="/artificial-intelligence">AI</a>
                            </li>
                            <li>
                                <a href="/social-media">Social Media</a>
                            </li>
                            <li>
                                <a href="/others">Others</a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer_links">
                        <p>Navigation</p>
                        <ul>
                            <li>
                                <a href="{{ url('/') }}">
                                    <span>Home</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('contact') }}">
                                    <span>Contact</span>
                                </a>
                            </li>
                            @guest
                                <li>
                                    <a href="{{ route('login') }}">
                                        <span>Sign in</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('register') }}">
                                        <span>Sign up</span>
                                    </a>
                                </li>
                            @endguest
                            @auth
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                        <span>Logout</span>
                                    </a>
                                    <form action="{{ route('logout') }}" method="POST" id="logout-form"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            @endauth
                        </ul>
                    </div>
                    <!--Popular posts-->
                    <div class="footer_links">
                        <p>Legal</p>
                        <ul>
                            <li>
                                <a href="{{ route('disclaimer') }}">
                                    <span>Disclaimer</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('terms-and-conditions') }}">
                                    <span>Terms and Conditions</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('privacy-policy') }}">
                                    <span>Privacy Policy</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('cookie-policy') }}">
                                    <span>Cookie Policy</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer_wrapper_down">
                <svg class="hidden">
                    <symbol id="icon-heart" viewBox="0 0 24 21">
                        <path
                            d="M20.497.957A6.765 6.765 0 0 0 17.22.114a6.76 
                            6.76 0 0 0-5.218 2.455A6.778 6.778 0 0 0 3.506.957 
                            6.783 6.783 0 0 0 0 6.897c0 .732.12 1.434.335 2.09 
                            1.163 5.23 11.668 11.827 11.668 11.827s10.498-6.596 
                            11.663-11.826a6.69 6.69 0 0 0 .336-2.091 6.786 6.786 
                            0 0 0-3.505-5.94z" />
                    </symbol>
                </svg>
                <div class="footer_copyright">
                    <p>&#169;{{ date('Y') }} - digishaz - Made with
                        <button class="iconbutton">
                            <svg class="icon icon--heart">
                                <use xlink:href="#icon-heart"></use>
                            </svg>
                        </button>
                        for a better web
                    </p>
                </div>
                <div class="footer_feedback">

                </div>
            </div>
        </footer>
        <!-- /.Footer -->
    </div>
    <!-- /.App -->
    <!-- Search overlay -->
    <div class="search-overlay">
        <span class="close-search">&times;</span>
        <form action="{{ route('search.index') }}" method="GET" class="search-input" autocomplete="off">
            @include('layouts.includes.fullscreen-search')
        </form>
    </div>
    <!-- /.Search overlay -->
    <!--Scripts -->
    <script>
        window.AuthUser = '{!! auth()->user() !!}'
        window.__auth = function() {
            try {
                return JSON.parse(AuthUser)
            } catch (error) {
                return null
            }
        }
    </script>
    @livewireScripts
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/lazyload.min.js') }}" defer></script>
    @stack('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.1.1/gsap.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/lazyload_users.js') }}" defer></script>
    <!-- /.Scripts -->

</body>
<!-- /.Body -->

</html>
