<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Watchlist · Ali Emin Çomoğlu</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
    <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/alertifyjs/css/alertify.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/alertifyjs/css/themes/semantic.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/star-rating-svg/css/star-rating-svg.css')}}" rel="stylesheet">
    <link href="{{asset('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css')}}"
          rel="stylesheet">
    @livewireStyles
    <!-- Template Main CSS File -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">


</head>
<body>
<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

        <h1 class="logo"><a href="{{route('index')}}">Watchlist</a></h1>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="{{route('index')}}#hero"><i class='bx bx-home'></i>Home</a></li>
                @auth
                    <li><a href="{{route('listindex')}}"><i class='bx bx-list-ul' ></i>My list</a></li>
                    <li><a class="nav-link scrollto" href="{{route('search')}}"><i class='bx bx-search-alt-2' ></i>Search Movies</a></li>
                    <li class="dropdown"><a href="#"><i class='bx bxs-user'></i><span>{{Auth::user()->name}}</span> @isset(Auth::user()->img)<img src="{{asset('/images/'.Auth::user()->img)}}" alt="" class="profile-photo">@endisset <i
                                class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="{{route('profile')}}"><i class='bx bxs-user-detail' ></i>Profile</a></li>
                            <li><a href="{{route('editprofile')}}"><i class='bx bxs-user-detail' ></i>Edit Profile</a></li>
                            <li><a href="{{route('logout')}}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class='bx bx-log-out' ></i>Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth
                @guest
                    <li><a class="getstarted scrollto" href="{{route('login')}}">Login</a></li>
                @endguest
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
@yield('content')
<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="container">
        <div class="copyright">
            <strong><span>Watchlist application</span></strong>
        </div>
        <div class="credits">
            Developed by <a href="">Ali Emin Çomoğlu</a>
        </div>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{asset('https://code.jquery.com/jquery-3.7.0.min.js')}}" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g="
        crossorigin="anonymous"></script>
<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
<script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('assets/vendor/alertifyjs/alertify.min.js')}}"></script>
<script src="{{asset('https://code.jquery.com/ui/1.13.2/jquery-ui.js')}}"
        integrity="sha256-xLD7nhI62fcsEZK2/v8LsBcb4lG7dgULkuXoXB/j91c=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
<script src="https://accounts.google.com/gsi/client" async></script>


<!-- Template Main JS File -->
<script src="{{asset('assets/js/main.js')}}"></script>
@include('scripts')
@yield('scripts')
@livewireScripts
</body>

</html>
