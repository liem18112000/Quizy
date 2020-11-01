<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    @yield('styles')

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    <link rel="icon" href="{{ asset('img/favicon.png')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <!-- themify CSS -->
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <script src="{{ asset('js/sweetalert2.min.js')}}"></script>

    @auth
    @if(Auth::user()->setting && Auth::user()->setting->mode == '1')
        <link href="{{ asset('css/dark-mode.css')}}" rel="stylesheet">
    @endif
    @endauth

    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css')}}">



</head>
<body>

    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="{{ route('home')}}"> <img src="{{ asset('img/logo.png')}}" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item justify-content-end"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav align-items-center">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ route('home')}}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('about')}}">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('course.index') }}">Courses</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('news.index')}}">News</a>
                                </li>
                                {{-- <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Pages
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="single-blog.html">Single blog</a>
                                        <a class="dropdown-item" href="elements.html">Elements</a>
                                    </div>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('contact')}}">Contact</a>
                                </li>


                                @guest
                                <li class="nav-item">
                                    <a class="btn_1" href="{{ route('login')}}"> <i class="fa fa-lock" aria-hidden="true"></i> Login</a>
                                </li>
                                @endguest

                                @auth

                                <li class="nav-item dropdown">


                                    <a class="nav-link dropdown-toggle btn_2" href="#" style='padding: 10px 30px;' data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <strong>{{Auth::user()->roles->sortBy('role_type_id')->last()->roleType->name}}</strong> {{Auth::user()->name}}
                                    </a>


                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @if(Auth::user()->roles->where('role_type_id', 1))
                                            <a class="dropdown-item" href="{{ route('admin.dashboard')}}">Admin Dashboard</a>
                                            <div class='dropdown-divider'></div>
                                        @endif
                                        @if(Auth::user()->roles->first()->roleType->where('role_type_id',2))
                                            <a class="dropdown-item" href="{{ route('lecturer.dashboard')}}">Lecturer Dashboard</a>
                                            <div class='dropdown-divider'></div>
                                        @endif
                                        <a class="dropdown-item" href="{{ route('profile.show', Auth::user()->profile)}}">Profile</a>
                                        <div class='dropdown-divider'></div>

                                        <a class="dropdown-item" href="{{ route('setting.mode')}}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('mode-form').submit();">
                                            {{ __('Change mode') }}
                                        </a>

                                        <div class='dropdown-divider'></div>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>

                                        <form id="mode-form" action='{{ route('setting.mode')}}' method='POST'>
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                                @endauth

                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->


    @yield('content')

    @include('sweetalert::alert')


    <!-- footer part start-->
    <footer class="footer-area">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-sm-6 col-md-4 col-xl-3">
                    <div class="single-footer-widget footer_1">
                        <a href="index.html"> <img src="{{ asset('img/logo.png')}}" alt=""> </a>
                        <p>But when shot real her. Chamber her one visite removal six
                            sending himself boys scot exquisite existend an </p>
                        <p>But when shot real her hamber her </p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-4">
                    <div class="single-footer-widget footer_2">
                        <h4>Newsletter</h4>
                        <p>Stay updated with our latest trends Seed heaven so said place winged over given forth fruit.
                        </p>
                        <form action="#">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder='Enter email address'
                                        onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Enter email address'">
                                    <div class="input-group-append">
                                        <button class="btn btn_1" type="button"><i class="ti-angle-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="social_icon">
                            <a href="#"> <i class="ti-facebook"></i> </a>
                            <a href="#"> <i class="ti-twitter-alt"></i> </a>
                            <a href="#"> <i class="ti-instagram"></i> </a>
                            <a href="#"> <i class="ti-skype"></i> </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-md-4">
                    <div class="single-footer-widget footer_2">
                        <h4>Contact us</h4>
                        <div class="contact_info">
                            <p><span> Address :</span> Hath of it fly signs bear be one blessed after </p>
                            <p><span> Phone :</span> +2 36 265 (8060)</p>
                            <p><span> Email : </span>info@colorlib.com </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright_part_text text-center">
                        <div class="row">
                            <div class="col-lg-12">
                                <p class="footer-text m-0">
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="{{route('home')}}">Quizy</a>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer part end-->





    <!-- jquery plugins here-->
    <!-- jquery -->
    <script src="{{ asset('js/jquery-1.12.1.min.js') }}"></script>
    <!-- popper js -->
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- easing js -->
    <script src="{{ asset('js/jquery.magnific-popup.js') }}"></script>
    <!-- swiper js -->
    <script src="{{ asset('js/swiper.min.js') }}"></script>
    <!-- swiper js -->
    <script src="{{ asset('js/masonry.pkgd.js') }}"></script>
    <!-- particles js -->
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
    <!-- swiper js -->
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('js/waypoints.min.js') }}"></script>
    <!-- custom js -->
    <script src="{{ asset('js/custom.js') }}"></script>

    @yield('scripts')


</body>
</html>
