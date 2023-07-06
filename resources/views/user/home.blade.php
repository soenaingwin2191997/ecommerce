@extends('layouts.user')

@section('homePage')
    active
@endsection
@php
    $count=App\Models\Product::all()->count();
    if ($count > 8) {
        $featured=App\Models\Product::inRandomOrder()->limit(8)->get();
    } else {
        $featured=App\Models\Product::inRandomOrder()->limit($count)->get();
    }

    if ($count > 8) {
        $popularProduct=App\Models\Product::orderBy('view_count','DESC')->limit(8)->get();
    } else {
        $popularProduct=App\Models\Product::orderBy('view_count','DESC')->limit($count)->get();
    }

    if ($count > 8) {
        $newAdd=App\Models\Product::orderBy('id','DESC')->limit(8)->get();
    } else {
        $newAdd=App\Models\Product::orderBy('id','DESC')->limit($count)->get();
    }

    if ($count > 20) {
        $popular=App\Models\Product::inRandomOrder()->limit(20)->get();
    } else {
        $popular=App\Models\Product::inRandomOrder()->limit($count)->get();
    }

    if ($count > 20) {
        $newArrivals=App\Models\Product::inRandomOrder()->limit(20)->get();
    } else {
        $newArrivals=App\Models\Product::inRandomOrder()->limit($count)->get();
    }

@endphp

@section('user')
<main class="main">
    <section class="home-slider position-relative pt-50">
        <div class="hero-slider-1 dot-style-1 dot-style-1-position-1">
            <div class="single-hero-slider single-animation-wrap">
                <div class="container">
                    <div class="row align-items-center slider-animated-1">
                        <div class="col-lg-5 col-md-6">
                            <div class="hero-slider-content-2">
                                <h4 class="animated">Trade-in offer</h4>
                                <h2 class="animated fw-900">Supper value deals</h2>
                                <h1 class="animated fw-900 text-brand">On all products</h1>
                                <p class="animated">Save more with coupons & up to 70% off</p>
                                <a class="animated btn btn-brush btn-brush-3" href="{{ url('shop/page') }}"> Shop Now </a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="single-slider-img single-slider-img-1">
                                <img class="animated slider-1-1" src="{{ asset('user/assets/imgs/slider/slider-1.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-hero-slider single-animation-wrap">
                <div class="container">
                    <div class="row align-items-center slider-animated-1">
                        <div class="col-lg-5 col-md-6">
                            <div class="hero-slider-content-2">
                                <h4 class="animated">Hot promotions</h4>
                                <h2 class="animated fw-900">Fashion Trending</h2>
                                <h1 class="animated fw-900 text-7">Great Collection</h1>
                                <p class="animated">Save more with coupons & up to 20% off</p>
                                <a class="animated btn btn-brush btn-brush-2" href="{{ url('shop/page') }}"> Discover Now </a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="single-slider-img single-slider-img-1">
                                <img class="animated slider-1-2" src="assets/imgs/slider/slider-2.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider-arrow hero-slider-1-arrow"></div>
    </section>
    <section class="featured section-padding position-relative">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{ asset('user/assets/imgs/theme/icons/feature-1.png') }}" alt="">
                        <h4 class="bg-1">Free Shipping</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{ asset('user/assets/imgs/theme/icons/feature-2.png') }}" alt="">
                        <h4 class="bg-3">Online Order</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{ asset('user/assets/imgs/theme/icons/feature-3.png') }}" alt="">
                        <h4 class="bg-2">Save Money</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{ asset('user/assets/imgs/theme/icons/feature-4.png') }}" alt="">
                        <h4 class="bg-4">Promotions</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{ asset('user/assets/imgs/theme/icons/feature-5.png') }}" alt="">
                        <h4 class="bg-5">Happy Sell</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{ asset('user/assets/imgs/theme/icons/feature-6.png') }}" alt="">
                        <h4 class="bg-6">24/7 Support</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="product-tabs section-padding position-relative wow fadeIn animated">
        <div class="bg-square"></div>
        <div class="container">
            <div class="tab-header">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one" aria-selected="true">Featured</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="nav-tab-two" data-bs-toggle="tab" data-bs-target="#tab-two" type="button" role="tab" aria-controls="tab-two" aria-selected="false">Popular</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="nav-tab-three" data-bs-toggle="tab" data-bs-target="#tab-three" type="button" role="tab" aria-controls="tab-three" aria-selected="false">New added</button>
                    </li>
                </ul>
                <a href="{{ url('shop/page') }}" class="view-more d-none d-md-flex">View More<i class="fi-rs-angle-double-small-right"></i></a>
            </div>
            <!--End nav-tabs-->

            <div class="tab-content wow fadeIn animated" id="myTabContent">
                <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                    <div class="row product-grid-4">
                        @foreach ($featured as $f)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{ url('shop/detail',$f->id) }}">
                                                <img style="width: 100%;" class="default-img" src="{{ asset('storage/images/product_images/'.$f->product_image) }}" alt="Photo">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <h2><a href="{{ url('shop/detail',$f->id) }}">{{ $f->product_name }}</a></h2>
                                        <div class="product-price">
                                            @if ($f->discount_price!=null)
                                                <span>{{ $f->discount_price }} Ks</span>
                                                <span class="old-price">{{ $f->normal_price }} Ks</span>
                                            @else
                                                <span>{{ $f->normal_price }} Ks</span>
                                            @endif
                                        </div>
                                        <div class="product-action-1 show">
                                            @auth
                                                <button type="button" productId="{{ $f->id }}" aria-label="Add To Cart" class="action-btn hover-up addToCartBtn" ><i class="fi-rs-shopping-bag-add"></i></button>
                                            @endauth
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!--En tab one (Featured)-->

                <div class="tab-pane fade" id="tab-two" role="tabpanel" aria-labelledby="tab-two">
                    <div class="row product-grid-4">
                        @foreach ($popularProduct as $p)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{ url('shop/detail',$p->id) }}">
                                                <img style="width: 100%;" class="default-img" src="{{ asset('storage/images/product_images/'.$p->product_image) }}" alt="Photo">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <h2><a href="{{ url('shop/detail',$p->id) }}">{{ $p->product_name }}</a></h2>
                                        <div class="product-price">
                                            @if ($f->discount_price!=null)
                                                <span>{{ $p->discount_price }} Ks</span>
                                                <span class="old-price">{{ $f->normal_price }} Ks</span>
                                            @else
                                                <span>{{ $p->normal_price }} Ks</span>
                                            @endif
                                        </div>
                                        <div class="product-action-1 show">
                                            @auth
                                                <button type="button" productId="{{ $p->id }}" aria-label="Add To Cart" class="action-btn hover-up addToCartBtn" ><i class="fi-rs-shopping-bag-add"></i></button>
                                            @endauth
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!--En tab two (Popular)-->

                <div class="tab-pane fade" id="tab-three" role="tabpanel" aria-labelledby="tab-three">
                    <div class="row product-grid-4">
                        @foreach ($newAdd as $na)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{ url('shop/detail',$na->id) }}">
                                                <img style="width: 100%;" class="default-img" src="{{ asset('storage/images/product_images/'.$na->product_image) }}" alt="Photo">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <h2><a href="{{ url('shop/detail',$na->id) }}">{{ $na->product_name }}</a></h2>
                                        <div class="product-price">
                                            @if ($na->discount_price!=null)
                                                <span>{{ $na->discount_price }} Ks</span>
                                                <span class="old-price">{{ $na->normal_price }} Ks</span>
                                            @else
                                                <span>{{ $na->normal_price }} Ks</span>
                                            @endif
                                        </div>
                                        <div class="product-action-1 show">
                                            @auth
                                                <button type="button" productId="{{ $na->id }}" aria-label="Add To Cart" class="action-btn hover-up addToCartBtn" ><i class="fi-rs-shopping-bag-add"></i></button>
                                            @endauth
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!--End tab-content-->
        </div>
    </section>

    <section class="banner-2 section-padding pb-0">
        <div class="container">
            <div class="banner-img banner-big wow fadeIn animated f-none">
                <img src="{{ asset('user/assets/imgs/banner/banner-4.png') }}" alt="">
                <div class="banner-text d-md-block d-none">
                    <h4 class="mb-15 mt-40 text-brand">Repair Services</h4>
                    <h1 class="fw-600 mb-20">We're an Apple <br>Authorised Service Provider</h1>
                    <a href="{{ url('shop/page') }}" class="btn">Learn More <i class="fi-rs-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>
    <section class="popular-categories section-padding mt-15 mb-25">
        <div class="container wow fadeIn animated">
            <h3 class="section-title mb-20"><span>Popular</span> Categories</h3>
            <div class="carausel-6-columns-cover position-relative">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-arrows"></div>
                <div class="carausel-6-columns" id="carausel-6-columns">
                    @foreach ($popular as $p)
                        <div class="card-1">
                            <figure class=" img-hover-scale overflow-hidden">
                                <a href="{{ url('shop/detail',$p->id) }}"><img style="width: 100%;" src="{{ asset('storage/images/product_images/'.$p->product_image) }}" alt="Photo"></a>
                            </figure>
                            <h5><a href="{{ url('shop/detail',$p->id) }}">{{ $p->product_name }}</a></h5>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="banners mb-15">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="banner-img wow fadeIn animated">
                        <img src="{{ asset('user/assets/imgs/banner/banner-1.png') }}" alt="">
                        <div class="banner-text">
                            <span>Smart Offer</span>
                            <h4>Save 20% on <br>Woman Bag</h4>
                            <a href="{{ url('shop/page') }}">Shop Now <i class="fi-rs-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="banner-img wow fadeIn animated">
                        <img src="{{ asset('user/assets/imgs/banner/banner-2.png') }}" alt="">
                        <div class="banner-text">
                            <span>Sale off</span>
                            <h4>Great Summer <br>Collection</h4>
                            <a href="{{ url('shop/page') }}">Shop Now <i class="fi-rs-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-md-none d-lg-flex">
                    <div class="banner-img wow fadeIn animated  mb-sm-0">
                        <img src="{{ asset('user/assets/imgs/banner/banner-3.png') }}" alt="">
                        <div class="banner-text">
                            <span>New Arrivals</span>
                            <h4>Shop Today’s <br>Deals & Offers</h4>
                            <a href="{{ url('shop/page') }}">Shop Now <i class="fi-rs-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-padding">
        <div class="container wow fadeIn animated">
            <h3 class="section-title mb-20"><span>New</span> Arrivals</h3>
            <div class="carausel-6-columns-cover position-relative">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-2-arrows"></div>
                <div class="carausel-6-columns carausel-arrow-center" id="carausel-6-columns-2">
                    @foreach ($newArrivals as $nav)
                        <div class="product-cart-wrap small hover-up">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{ url('shop/detail',$nav->id) }}">
                                        <img style="width: 100%;" class="default-img" src="{{ asset('storage/images/product_images/'.$nav->product_image) }}" alt="Photo">
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a product_id="{{ $nav->id }}" aria-label="Quick view" class="action-btn small hover-up quickView" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                        <i class="fi-rs-eye"></i></a>
                                    <a aria-label="Add To Wishlist" wishlist-product-id="{{ $nav->id }}" class="action-btn small hover-up wishlistBtn" tabindex="0"><i class="fi-rs-heart"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">Hot</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <h2><a href="{{ url('shop/detail',$nav->id) }}">{{ $nav->product_name }}</a></h2>
                                <div class="product-price">
                                    @if ($nav->discount_price!=null)
                                        <span>{{ $nav->discount_price }} Ks</span><br>
                                        <span class="old-price">{{ $nav->normal_price }} Ks</span>
                                    @else
                                        <span>{{ $nav->normal_price }} Ks</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding">
        <div class="container">
            <h3 class="section-title mb-20 wow fadeIn animated"><span>Featured</span> Brands</h3>
            <div class="carausel-6-columns-cover position-relative wow fadeIn animated">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-3-arrows"></div>
                <div class="carausel-6-columns text-center" id="carausel-6-columns-3">
                    <div class="brand-logo">
                        <img class="img-grey-hover" src="{{ asset('user/assets/imgs/banner/brand-1.png') }}" alt="Logo">
                    </div>
                    <div class="brand-logo">
                        <img class="img-grey-hover" src="{{ asset('user/assets/imgs/banner/brand-2.png') }}" alt="Logo">
                    </div>
                    <div class="brand-logo">
                        <img class="img-grey-hover" src="{{ asset("user/assets/imgs/banner/brand-3.png") }}" alt="Logo">
                    </div>
                    <div class="brand-logo">
                        <img class="img-grey-hover" src="{{ asset('user/assets/imgs/banner/brand-4.png') }}" alt="Logo">
                    </div>
                    <div class="brand-logo">
                        <img class="img-grey-hover" src="{{ asset('user/assets/imgs/banner/brand-5.png') }}" alt="Logo">
                    </div>
                    <div class="brand-logo">
                        <img class="img-grey-hover" src="{{ asset('user/assets/imgs/banner/brand-6.png') }}" alt="Logo">
                    </div>
                    <div class="brand-logo">
                        <img class="img-grey-hover" src="{{ asset('user/assets/imgs/banner/brand-3.png') }}" alt="Logo">
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

{{-- For Quick View --}}
<div class="modal fade custom-modal" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div id="quickViewBody" class="modal-body">
                {{-- Ajax Data --}}
            </div>
        </div>
    </div>
</div>
@endsection

@section('userJs')
    <script>
        $(document).ready(function(){
            $('.addToCartBtn').click(function(){
                $product_id=$(this).attr('productId');
                $.ajax({
                    type:'get',
                    url:"{{ url('ajax/user/addtocart') }}",
                    dataType:'json',
                    data:{
                        'product_id':$product_id,
                    },
                });
                    // For Toasrt
                    toastr.options={
                    "progressBar":true,
                    "closeButton":true,
                    }
                    toastr.success("Add To Cart Successful!");
            });

            $('.quickView').click(function(){
                $product_id=$(this).attr('product_id');
                $.ajax({
                    type:"get",
                    url:"{{ url('ajax/quick-view/user') }}",
                    dataType:'json',
                    data:{
                        'id':$product_id,
                    },
                    success:function(respone){
                        if(respone[0]['discount_price']!=null){
                            $disc_price=respone[0]['discount_price']+" Ks";
                            $nor_price=respone[0]['normal_price']+" Ks";
                        }else{
                            $disc_price=respone[0]['normal_price']+" Ks";
                            $nor_price="";
                        }
                        if(respone[0]['des1']!=null){
                            $des1=respone[0]['des1'];
                        }else{
                            $des1="No Data";
                        }
                        if(respone[0]['des1']!=null){
                            $des2=respone[0]['des2'];
                        }else{
                            $des2="No Data";
                        }
                        if(respone[0]['des1']!=null){
                            $des3=respone[0]['des3'];
                        }else{
                            $des3="No Data";
                        }
                        if(respone[0]['des1']!=null){
                            $des4=respone[0]['des4'];
                        }else{
                            $des4="No Data";
                        }
                        if(respone[0]['des1']!=null){
                            $des5=respone[0]['des5'];
                        }else{
                            $des5="No Data";
                        }
                        if(respone[0]['des1']!=null){
                            $des6=respone[0]['des6'];
                        }else{
                            $des6="No Data";
                        }
                        $('#quickViewBody').html(`
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-gallery">
                                        <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                        <div class="product-image-slider">
                                            <figure class="border-radius-10">
                                                <img src="{{ asset('storage/images/product_images/`+ respone[0][`product_image`] +`') }}" alt="product image">
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-info">
                                        <h3 class="title-detail mt-30">${respone[0]['product_name']}</h3>
                                        <div class="clearfix product-price-cover">
                                            <div class="product-price primary-color float-left">
                                                <ins><span class="text-brand">${$disc_price}</span></ins>
                                                <ins><span class="old-price font-md ml-15">${$nor_price}</span></ins>
                                            </div>
                                        </div>
                                        <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                        <div class="short-desc mb-30">
                                            <p class="font-sm">${respone[0]['long_des']}</p>
                                        </div>
                                        <ul class="product-meta font-xs color-grey mt-50">
                                            <li class="mb-5">${$des1}</li>
                                            <li class="mb-5">${$des2}</li>
                                            <li class="mb-5">${$des3}</li>
                                            <li class="mb-5">${$des4}</li>
                                            <li class="mb-5">${$des5}</li>
                                            <li class="mb-5">${$des6}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        `);

                    }
                });
            });

            $(".wishlistBtn").click(function(){
                $product_id=$(this).attr('wishlist-product-id');
                $.ajax({
                    type:'get',
                    url:"{{ url('ajax/user/addtowishlist') }}",
                    dataType:'json',
                    data:{
                        'product_id':$product_id,
                    },
                });
                    // For Toasrt
                    toastr.options={
                    "progressBar":true,
                    "closeButton":true,
                    }
                    toastr.success("Add To Wishlist Successful!");
            });
        });
    </script>
@endsection
