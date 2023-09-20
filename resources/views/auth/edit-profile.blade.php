@extends('layouts.app')
@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>My Profile</h2>
                <ol>
                    <li><a href="{{route('index')}}">Home</a></li>
                    <li><a href="{{route('profile')}}">My Profile</a></li>
                    <li>Edit Profile</li>
                </ol>
            </div>
        </div>
    </section>
    <!-- End Breadcrumbs -->
    <div class="container" style="min-height: 80dvh">
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">

                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="{{asset('/images/'.Auth::user()->img)}}" alt="profile_image"
                                         class="rounded-circle" width="150" id="image">
                                    <div class="mt-3">
                                        <h4>{{Auth::user()->name}}</h4>
                                        <p class="text-secondary mb-1">{{Auth::user()->email}}</p>
                                        <form action="{{route('editprofile-post')}}" method="POST" enctype="multipart/form-data"
                                              id="editProfileForm">
                                            <label class="custom-button positive upload-button">
                                                <input type="file" style="display: none" name="image"
                                                        onchange="previewProfilePhoto(event)" accept="image/*">
                                                    Upload Image
                                            </label>
                                            <button type="submit"></button>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row gutters-sm">
                        <div class="card mt-3">
                            <div class="card-body">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-4">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-8 text-secondary">
                                        <input type="text" name="name" value="{{ Auth::user()->name }}"
                                               class="form-control" required>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">

                                    <div class="col-sm-4">
                                        <h6 class="mb-0">Password</h6>
                                    </div>
                                    <div class="col-sm-8 text-secondary">
                                        <input type="password" name="old_password" placeholder="********"
                                               class="form-control"  @if(Auth::user()->gauth_type =='google') disabled @endif>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <h6 class="mb-0">New Password</h6>
                                    </div>
                                    <div class="col-sm-8 text-secondary">
                                        <input type="password" name="password" placeholder="********"
                                               class="form-control" @if(Auth::user()->gauth_type =='google') disabled @endif>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-4">
                                        <h6 class="mb-0">Confirm New Password</h6>
                                    </div>
                                    <div class="col-sm-8 text-secondary">
                                        <input type="password" name="password_confirmation" placeholder="********"
                                               class="form-control" @if(Auth::user()->gauth_type =='google') disabled @endif>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-8 text-secondary">
                                        <input type="email" name="email" value="{{ Auth::user()->email }}"
                                               class="form-control" required>
                                    </div>
                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <h6 class="mb-0">Info</h6>
                                    </div>
                                    <div class="col-sm-8 text-secondary">
                                        <textarea name="info" class="form-control">{{ Auth::user()->info }}</textarea>
                                    </div>
                                </div>
                                <div class="mt-3 text-center">
                                    <button type="submit" class="custom-button positive">Update Profile</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

