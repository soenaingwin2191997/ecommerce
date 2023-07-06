@extends('layouts.user')

@section('user')
    <div class="container">
        <div class="row p-4">
            <div class="page-header breadcrumb-wrap mb-4">
                <div class="container">
                    <div class="breadcrumb">
                        <a href="{{ url('user/page') }}" rel="nofollow">Home</a>
                        <span></span> Your Profile
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-center">
                <div class="col-12 col-md-6 col-lg-6 border p-4">
                    <div class="d-flex justify-content-center">
                        <div style="border-radius:50%; border:4px solid gray; width:300px; height:300px;" class=" overflow-hidden">
                            @php
                                if(Auth::user()->profile_image){
                                    $profile="profile_images/".Auth::user()->profile_image;
                                }else {
                                    $profile="404-images/profile.jpg";
                                }
                            @endphp
                            <img style="object-fit: cover;" class="w-100" src="{{ asset('storage/images/'.$profile) }}" alt="Profile">
                        </div>
                    </div>
                    <h4 class="text-center my-4 ps-5">{{ Auth::user()->name }} <a href="{{ url('user-edit-profile/page',Auth::user()->id) }}" class="fs-6 float-end">Edit Profile</a></h4>
                    <table class="table border-0">
                        <thead>
                            <tr>
                                <td class="text-center">Name</td>
                                <td>{{ Auth::user()->name }}</td>
                            </tr>
                            <tr>
                                <td class="text-center">Phone</td>
                                <td>{{ Auth::user()->phone }}</td>
                            </tr>
                            <tr>
                                <td class="text-center">Email</td>
                                <td>{{ Auth::user()->email }}</td>
                            </tr>
                            <tr>
                                <td class="text-center">Address</td>
                                <td>{{ Auth::user()->address }}</td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
