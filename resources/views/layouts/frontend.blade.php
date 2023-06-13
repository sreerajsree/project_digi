<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <!-- Head -->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', config('app.name'))</title>
        <meta name="description" content="@yield('meta', config('app.name'))">
        <meta name="robots" content="index, follow">
        <!-- Styles -->
        @livewireStyles
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>   
    <!-- /.Head -->
    
    <!-- Body -->
    <body>
        @env('production')
        
        @endenv
        
        @include('cookie-consent::index')
        
        <!-- App -->
        <div id="app">
            
            <!-- Header -->
            <header>
                <div class="menu-wrapper">
                    <div class="logo">
                        <a href="{{ url('/') }}">
                            digi<span class="logo-span">shaz</span>
                        </a>
                    </div>
                    <!-- Navigation -->
                    <nav>
                        <ul>
                            <li class="sub-menu">
                                <a href="javascript:void(0)">News</a>
                                <ul>
                                    <li>
                                        <a href="{{ url('/categories/digital-marketing') }}" class="sub-item">
                                            <span>Digital Marketing</span>
                                        </a>
                                    </li>
                                    
                                </ul>
                            </li>
                            <li class="sub-menu">
                                <a href="javascript:void(0)">By Tags</a>
                                <ul>
                                    <li>
                                        <a href="{{ url('/tags/worldwide') }}" class="sub-item">
                                            <span>Worldwide</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('contact') }}">Contacts</a>
                            </li>
                            @guest
                            <li>
                                <a href="{{ route('login') }}">Sign in</a>
                            </li>
                            @endguest
                            @auth
                            <li class="sub-menu">
                                <a href="javascript:void(0)">{{ Auth::user()->name }}</a>
                                <ul>
                                    <li>
                                        <a href="{{ route('logout') }}" class="sub-item" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                            <span>Logout</span>
                                        </a>
                                        <form action="{{ route('logout') }}" method="POST" id="logout-form" style="display: none;">
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
                    </nav>
                    <!-- /.Navigation -->
                    <div class="menu-toggle">
                        <div class="hamburger-menu">
                        </div>
                    </div>
                </div>
                <!-- Search overlay -->
                <div class="search-overlay">
                    <span class="close-search">&times;</span>
                    <form action="{{ route('search.index') }}" method="GET" class="search-input" autocomplete="off">
                        @include('layouts.includes.fullscreen-search')
                    </form>
                </div>
                <!-- /.Search overlay -->
            </header>
            <!-- /.Header -->
            
             <!-- Main -->
            <main>
                @yield('content')
            </main>
             <!-- /.Main -->

            <!--Footer-->
            <footer>
                <div class="footer_wrapper_upper">
                    <div class="footer_about">
                        <div class="logo">
                            <a href="{{ url('/') }}">
                                digi<span class="logo-span">shaz</span>
                            </a>
                        </div>
                    </div>
                    <div class="footer_links">
                        <p>News</p>
                        <ul>
                            <li>
                                <a href="{{ url('/categories/demo') }}">
                                    <span>demo</span>
                                </a>
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
                                    <span>Contacts</span>
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
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                    <span>Logout</span>
                                </a>
                                <form action="{{ route('logout') }}" method="POST" id="logout-form" style="display: none;">
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
                <div class="footer_wrapper_down">
                    <svg class="hidden">
                    <symbol id="icon-heart" viewBox="0 0 24 21">
                        <path d="M20.497.957A6.765 6.765 0 0 0 17.22.114a6.76 
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
        
        <!--Scripts -->
        <script>
            window.AuthUser = '{!! auth()->user() !!}'
            window.__auth = function () {
                try {
                    return JSON.parse(AuthUser)
                } catch (error) {
                    return null
                }
            }
        </script>
        @livewireScripts
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="{{ asset('js/lazyload.min.js') }}" defer></script>
        @stack('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.1.1/gsap.min.js"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/lazyload_users.js') }}" defer></script>
        <!-- /.Scripts -->
        
    </body>
    <!-- /.Body -->
    
</html>