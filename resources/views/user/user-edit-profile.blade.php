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
                        <div style="border-radius:50%; border:4px solid gray; width:300px; height:300px;" class="d-flex align-content-center justify-content-center overflow-hidden">
                            @php
                                if(Auth::user()->profile_image){
                                    $profile="profile_images/".Auth::user()->profile_image;
                                }else {
                                    $profile="404-images/profile.jpg";
                                }
                            @endphp
                            <img style="object-fit: cover;" id="profileImg" class="w-100" src="{{ asset('storage/images/'.$profile) }}" alt="Profile">
                        </div>
                    </div>
                    <form action="{{ url('user/profile/edit') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $user[0]['id'] }}" name="userId">
                        <input id="profileInput" class=" form-control my-3" type="file" accept="image/jpeg,image/png,image/jpg,image/jfif" name="profile_image" id="">
                        <div class="mb-3">
                            <label class="form-label" for="name">Name</label>
                            <input class="form-control" value="{{ $user[0]['name'] }}" type="text" name="name" id="name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="phone">Phone</label>
                            <input class="form-control" value="{{ $user[0]['phone'] }}" type="text" name="phone" id="phone">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="address">Address</label>
                            <input class="form-control" value="{{ $user[0]['address'] }}" type="text" name="address" id="address">
                        </div>
                        <input class="btn float-end" type="submit" value="Update">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('userJs')
    <script>
        $(document).ready(function(){
            $('#profileInput').change(function(){
                $('#profileImg').attr('src',URL.createObjectURL(this.files[0]));
            });
        });
    </script>
@endsection
