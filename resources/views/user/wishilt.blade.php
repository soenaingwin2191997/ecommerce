@extends('layouts.user')


@section('user')
    <div class="container">
        <div class="row p-4">
            @foreach ($wishilts as $wishilt)
                <div class="col-12">
                    <div class="col d-md-flex d-lg-flex">
                        <div class="col-12 col-md-4 col-lg-4 text-center mb-3 mb-lg-0 mb-md-0">
                            <img class="w-50" src="{{ asset('storage/images/product_images/'.$wishilt->product_image) }}" alt="Photo">
                            <h5 class="mb-1"><a href="{{ url('shop/detail',$wishilt->product_id) }}">{{ $wishilt->product_name }}</a></h5>
                            <h5>Price: {{ $wishilt->discount_price? $wishilt->discount_price : $wishilt->normal_price }} Ks</h5>
                        </div>
                        <div class="col-12 col-md-8 col-lg-8 d-flex">
                            <div class="col p-md-5 p-lg-5">
                                @if ($wishilt->des1)
                                    <h5 class="mb-3"><span><i class="fa-solid fa-circle-info me-2" style="color: #1f64db;"></i></span>{{ $wishilt->des1 }}</h5>
                                @endif
                                @if ($wishilt->des2)
                                    <h5 class="mb-3"><span><i class="fa-solid fa-circle-info me-2" style="color: #1f64db;"></i></span>{{ $wishilt->des2 }}</h5>
                                @endif
                                @if ($wishilt->des3)
                                    <h5 class="mb-3"><span><i class="fa-solid fa-circle-info me-2" style="color: #1f64db;"></i></span>{{ $wishilt->des3 }}</h5>
                                @endif
                            </div>
                            <div class="col p-md-5 p-lg-5">
                                @if ($wishilt->des4)
                                    <h5 class="mb-3"><span><i class="fa-solid fa-circle-info me-2" style="color: #1f64db;"></i></span>{{ $wishilt->des4 }}</h5>
                                @endif
                                @if ($wishilt->des5)
                                    <h5 class="mb-3"><span><i class="fa-solid fa-circle-info me-2" style="color: #1f64db;"></i></span>{{ $wishilt->des5 }}</h5>
                                @endif
                                @if ($wishilt->des6)
                                    <h5 class="mb-3"><span><i class="fa-solid fa-circle-info me-2" style="color: #1f64db;"></i></span>{{ $wishilt->des6 }}</h5>
                                @endif
                            </div>
                            <div class="col-1 d-none d-md-block d-lg-block">
                                <a href="{{ url('wishilt/delete',$wishilt->wishilt_id) }}" class="btn"><i class="fa-solid fa-trash-can"></i></a>
                            </div>
                        </div>
                        <div class="col text-end d-md-none d-lg-none">
                            <a href="{{ url('wishilt/delete',$wishilt->wishilt_id) }}" class="btn"><i class="fa-solid fa-trash-can"></i></a>
                        </div>
                    </div>
                    <hr class=" text-indigo-950">
                </div>
            @endforeach
        </div>
    </div>
@endsection
