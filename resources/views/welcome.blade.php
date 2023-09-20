@extends('layouts.app')
@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div class="hero-container">
            <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

                <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

                <div class="carousel-inner" role="listbox">

                    <!-- Slide 1 -->
                    <div class="carousel-item active" style="background-image: url(assets/img/slide/slide-1.jpg);">
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2 class="animate__animated animate__fadeInDown">Watchlist Application</h2>
                                <p class="animate__animated animate__fadeInUp">Watchlist management application.</p>
                                @auth
                                    <div>
                                        <a href="{{route('listindex')}}" class="btn-get-started animate__animated animate__fadeInUp scrollto">My List</a>
                                    </div>
                                @endauth
                                @guest
                                    <div>
                                        <a href="{{route('login')}}" class="btn-get-started animate__animated animate__fadeInUp scrollto">Log in</a>
                                    </div>
                                @endguest
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="carousel-item" style="background-image: url(assets/img/slide/slide-2.jpg);">
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2 class="animate__animated animate__fadeInDown">Manage your Watchlist</h2>
                                <p class="animate__animated animate__fadeInUp">Start making your list</p>
                                <div>
                                    <a href="{{route('search')}}" class="btn-get-started animate__animated animate__fadeInUp scrollto">Search movies</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="carousel-item" style="background-image: url(assets/img/slide/slide-3.jpg);">
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2 class="animate__animated animate__fadeInDown">View on GitHub</h2>
                                <p class="animate__animated animate__fadeInUp">View and examine source code</p>
                                <div>
                                    <a href="https://github.com/Emincmg/library"
                                       class="btn-get-started animate__animated animate__fadeInUp scrollto">GitHub</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                </a>

                <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                </a>

            </div>
        </div>
    </section><!-- End Hero -->
@endsection


