<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>Amin Foundation - Fundraiser &amp; helping Children</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('./img/core-img/logo.png') }}">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="preload-content">
            <div id="dento-load"></div>
        </div>
    </div>

    <!-- ***** Header Area Start ***** -->
    <header class="header-area">
        <!-- Top Header Area -->
        <div class="top-header-area">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <!-- Top Content -->
                    <div class="col-6 col-md-9 col-lg-8">
                        <div class="top-header-content">
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="0333 5050895"><i
                                    class="fa fa-phone"></i>
                                <span>Phone : 0333 5050895</span></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="imran5530@gmail.com"><i
                                    class="fa fa-envelope"></i> <span>Email : imran5530@gmail.com</span></a>
                        </div>
                    </div>
                    <!-- Top Header Social Info -->
                    <div class="col-6 col-md-3 col-lg-4">
                        <div class="top-header-social-info text-right">
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i
                                    class="fa fa-facebook"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i
                                    class="fa fa-twitter"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Google Plus"><i
                                    class="fa fa-google-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top Header End -->

        <!-- Main Header Start -->
        <div class="main-header-area">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Classy Menu -->
                    <nav class="classy-navbar justify-content-between" id="dentoNav">

                        <!-- Logo -->
                        <a class="nav-brand" href="{{ url('/') }}"><img src="{{ asset('img/core-img/logo.png')}}"
                                style="width: 75px;" alt="">Amin
                            Education Foundation</a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul id="nav">
                                    <li><a href="{{ url('/') }}">Home</a></li>
                                    <li><a href="{{ url('/about') }}">About</a></li>
                                    <li><a href="{{ url('/services') }}">Service</a></li>
                                    <li><a href="{{ url('/contact') }}">Contact</a></li>
                                    <!-- Authentication Links -->
                                    @guest
                                        @if (Route::has('login'))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                            </li>
                                        @endif

                                        @if (Route::has('register'))
                                            <li class="nav-item">
                                                <a class="nav-link"
                                                    href="{{ route('register') }}">{{ __('Register') }}</a>
                                            </li>
                                        @endif
                                    @else
                                    
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <img src="{{ Auth::user()->img_path ? asset(Auth::user()->img_path) : asset('storage/uploads/static-img/avatar7.png') }}" width="30" alt="">
                                        {{ Auth::user()->name }}
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    class="d-none">
                                                    @csrf
                                                </form>
                                                <a class="dropdown-item"
                                                    href="{{ route('Profile') }}">{{ __('Profile') }}</a>
                                                    @if (Auth::user()->is_admin == 1)
                                                    <a class="dropdown-item"
                                                    href="{{ route('admin.home') }}">{{ __('Admin Panel') }}</a>
                                                    @endif
                                            </div>
                                        </li>
                                    @endguest
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->
    @if (session()->has('error'))
        <div class="container">

            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        </div>
    @endif

    @yield('content')

    <!-- ***** Footer Area Start ***** -->
    <footer class="footer-area bg-img bg-gradient-overlay" style="background-image: url(img/bg-img/3.jpg);">
        <div class="container">
            <div class="row">
                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-footer-widget">
                        <a href="./index.html" class="d-block mb-4"><img src="./img/core-img/logo.png" alt=""></a>
                        <p>Etiam sutor risus, dapibus act elefend katen, lacinia sitamet denim. Mauris sagittis kansa
                            interdum
                            dignissim.</p>
                        <div class="footer-contact">
                            <p><i class="icon_pin"></i> Mamoon Plaza, Harichand Road, Dhakki
                                Charsadda, Khyber Pakhtunkhwa, Pakistan-24420</p>
                            <p><i class="icon_phone"></i> +92. 333. 5050895</p>
                            <p><i class="icon_mail"></i> imran5530@gmail.com</p>
                        </div>
                    </div>
                </div>

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg">
                    <div class="single-footer-widget">
                        <!-- Widget Title -->
                        <h5 class="widget-title">Opening Hours</h5>

                        <!-- Opening Hours -->
                        <ul class="opening-hours">
                            <li><span>Mon-Wed</span> <span>8.00-18.00</span></li>
                            <li><span>Thu-Fri</span> <span>8.00-17.00</span></li>
                            <li><span>Sat</span> <span>9.00-17.00</span></li>
                            <li><span>Sun</span> <span>10.00-17.00</span></li>
                            <li><span>Holiday</span> <span>Closed</span></li>
                        </ul>
                    </div>
                </div>

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg">
                    <div class="single-footer-widget">
                        <!-- Widget Title -->
                        <h5 class="widget-title">Quick Link</h5>

                        <!-- Quick Links Nav -->
                        <nav>
                            <ul class="quick-links">
                                <li><a href="#">About</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">Policy</a></li>
                                <li><a href="#">News</a></li>
                                <li><a href="#">Services</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg">
                    <div class="single-footer-widget">
                        <!-- Widget Title -->
                        <h5 class="widget-title">Newsletter</h5>

                        <p>We will send out weekly newest article and some great offers</p>
                        <!-- Newsletter Form -->
                        <div id="message"></div>
                        <div class="footer-newsletter-form">
                            <form id="newsletterform">
                                @csrf
                                <input type="email" name="email" value="" placeholder="Email Address">
                                <button type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                            </form>
                        </div>

                        <!-- Social Info -->
                        <div class="footer-social-info">
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i
                                    class="fa fa-facebook"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i
                                    class="fa fa-twitter"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Google Plus"><i
                                    class="fa fa-google-plus"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Linkedin"><i
                                    class="fa fa-linkedin"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Pinterest"><i
                                    class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Copywrite Area -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="copywrite-content">
                        <p>
                            <script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | made with <i class="fa fa-heart-o" style="color: red;"
                                aria-hidden="true"></i> by KhurshidKhan</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ***** Footer Area End ***** -->

    <!-- ******* All JS ******* -->
    <!-- jQuery js -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- Popper js -->
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- All js -->
    <script src="{{ asset('js/dento.bundle.js') }}"></script>
    <!-- Active js -->
    <script src="{{ asset('js/default-assets/active.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>



</body>

</html>
