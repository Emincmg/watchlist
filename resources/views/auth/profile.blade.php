@extends('layouts.app')
@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>My Profile</h2>
                <ol>
                    <li><a href="{{route('index')}}">Home</a></li>
                    <li>My Profile</li>
                </ol>
            </div>
        </div>
    </section>
    <!-- End Breadcrumbs -->
    <div class="container"style="min-height: 80dvh">
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="{{asset('images/'.Auth::user()->img)}}" alt="profile_image" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4>{{Auth::user()->name}}</h4>
                                    <p class="text-secondary mb-1">{{Auth::user()->email}}</p>
                                    <a href="{{route('editprofile')}}"><button class="custom-button positive">Edit Profile</button></a>
                                    <button class="custom-button negative">Logout</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-8 text-secondary">
                                    {{Auth::user()->name}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-8 text-secondary">
                                    {{Auth::user()->email}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <h6 class="mb-0">Registered at</h6>
                                </div>
                                <div class="col-sm-8 text-secondary">
                                    {{Auth::user()->created_at}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <h6 class="mb-0">Last modify</h6>
                                </div>
                                <div class="col-sm-8 text-secondary">
                                    {{Auth::user()->updated_at}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <h6 class="mb-0">Info</h6>
                                </div>
                                <div class="col-sm-8 text-secondary">
                                    {{Auth::user()->info}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row gutters-sm">
                        <div class="card mb-3">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap"><h6>Latest added user movies</h6></li>
                                @foreach($movies as $movie)
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <p style="font-size: 14px" class="mb-0">{{$movie['original_title']}}</p>
                                        <span style="font-size: 14px" class="text-secondary">Date added: {{$movie['created_at']}}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
