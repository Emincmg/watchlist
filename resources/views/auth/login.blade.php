@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 col-md-7 intro-section">
                <div class="intro-content-wrapper">
                    <h1 class="intro-title">Welcome to the Watchlist !</h1>
                    <p class="intro-text">Hello! Welcome to the Watchlist. Explore my watchlist application, where you can create your own watchlists and plan your future movies. Start making your watchlist journey today!</p>
                </div>
            </div>
            <div class="col-sm-6 col-md-5 form-section">
                <div class="login-wrapper">
                    <h2 class="login-title">Sign in</h2>
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-5">
                            <input name="login" id="login" class="btn login-btn" type="submit" value="Login">
                            <a href="javascript:void(0);" class="forgot-password-link" style="margin-left: 10px" onclick="showPass()">Show Password</a>
                            <a href="{{ route('password.request') }}" class="forgot-password-link">Forgot Your Password?</a>
                        </div>
                    </form>
                    <p class="login-wrapper-footer-text">Need an account? <a href="{{route('register')}}" class="text-reset">Signup here</a></p>
                    <div class="row">
                        <div class="col-md-16 d-flex justify-content-center">
                            <a class="btn login-btn" href="{{url('auth/google')}}" role="button" style="text-transform:none; font-size: 14px">
                                <img width="20px" style="margin-bottom:3px; margin-right:5px" alt="Google sign-in" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" />
                                Login with Google
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        body {
            background-color: #fff;
            font-family: 'Karla', sans-serif; }

        .intro-section {
            background-image: url(https://i.ibb.co/t2tbbh6/pexels-luis-quintero-2471234.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            padding: 75px 95px;
            min-height: 100vh;
            display: -webkit-box;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            flex-direction: column;
            color: #ffffff; }
        @media (max-width: 991px) {
            .intro-section {
                padding-left: 50px;
                padding-right: 50px; } }
        @media (max-width: 767px) {
            .intro-section {
                padding: 28px; } }
        @media (max-width: 575px) {
            .intro-section {
                min-height: auto; } }

        .brand-wrapper .logo {
            height: 35px; }

        @media (max-width: 767px) {
            .brand-wrapper {
                margin-bottom: 35px; } }

        .intro-content-wrapper {
            width: 410px;
            max-width: 100%;
            margin-top: auto;
            margin-bottom: auto; }
        .intro-content-wrapper .intro-title {
            font-size: 40px;
            font-weight: bold;
            margin-bottom: 17px; }
        .intro-content-wrapper .intro-text {
            font-size: 19px;
            line-height: 1.37; }
        .intro-content-wrapper .btn-read-more {
            background-color: #fff;
            padding: 13px 30px;
            border-radius: 0;
            font-size: 16px;
            font-weight: bold;
            color: #000; }
        .intro-content-wrapper .btn-read-more:hover {
            background-color: transparent;
            border: 1px solid #fff;
            color: #fff; }

        @media (max-width: 767px) {
            .intro-section-footer {
                margin-top: 35px; } }

        .intro-section-footer .footer-nav a {
            font-size: 20px;
            font-weight: bold;
            color: inherit; }
        @media (max-width: 767px) {
            .intro-section-footer .footer-nav a {
                font-size: 14px; } }
        .intro-section-footer .footer-nav a + a {
            margin-left: 30px; }

        .form-section {
            display: -webkit-box;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center; }
        @media (max-width: 767px) {
            .form-section {
                padding: 35px; } }

        .login-wrapper {
            width: 300px;
            max-width: 100%; }
        @media (max-width: 575px) {
            .login-wrapper {
                width: 100%; } }
        .login-wrapper .form-control {
            border: 0;
            border-bottom: 1px solid #e7e7e7;
            border-radius: 0;
            font-size: 14px;
            font-weight: bold;
            padding: 15px 10px;
            margin-bottom: 7px; }
        .login-wrapper .form-control::-webkit-input-placeholder {
            color: #b0adad; }
        .login-wrapper .form-control::-moz-placeholder {
            color: #b0adad; }
        .login-wrapper .form-control:-ms-input-placeholder {
            color: #b0adad; }
        .login-wrapper .form-control::-ms-input-placeholder {
            color: #b0adad; }
        .login-wrapper .form-control::placeholder {
            color: #b0adad; }

        .login-title {
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 30px; }

        .login-btn {
            padding: 13px 30px;
            background-color:#052E45;
            border-radius: 0;
            font-size: 20px;
            font-weight: bold;
            color: #fff; }
        .login-btn:hover {
            border: 1px solid#052E45;
            background-color: transparent;
            color:#052E45; }

        .forgot-password-link {
            font-size: 14px;
            color: #080808;
            text-decoration: underline; }

        .social-login-title {
            font-size: 15px;
            color: #919aa3;
            display: -webkit-box;
            display: flex;
            margin-bottom: 23px; }
        .social-login-title::before, .social-login-title::after {
            content: "";
            background-image: -webkit-gradient(linear, left top, left bottom, from(#f4f4f4), to(#f4f4f4));
            background-image: linear-gradient(#f4f4f4, #f4f4f4);
            -webkit-box-flex: 1;
            flex-grow: 1;
            background-size: calc(100% - 20px) 1px;
            background-repeat: no-repeat; }
        .social-login-title::before {
            background-position: center left; }
        .social-login-title::after {
            background-position: center right; }

        .social-login-links {
            text-align: center;
            margin-bottom: 32px; }

        .social-login-link img {
            width: 40px;
            height: 40px;
            -o-object-fit: contain;
            object-fit: contain; }

        .social-login-link + .socia-login-link {
            margin-left: 16px; }

        .login-wrapper-footer-text {
            font-size: 14px;
            text-align: center; }
    </style>
    <script type="text/javascript">
        function showPass() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
@endsection
