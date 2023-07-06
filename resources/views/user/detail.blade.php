@extends('layouts.user')
@section('user')
<input id="productId" type="hidden" value="{{ $product[0]['id'] }}">
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ url('shop/page') }}">Shop</a>
                <span></span> <a href="{{ url('shop/category',$productItem[0]['category_id']) }}">{{ $productItem[0]['item_name'] }}</a>
                <span></span> Detail Product
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="product-detail accordion-detail">
                        <div class="row mb-50">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="detail-gallery">
                                    <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                    <!-- MAIN SLIDES -->
                                    <div class="product-image-slider">
                                        <figure class="border-radius-10">
                                            <img src="{{ asset('storage/images/product_images/'.$product[0]['product_image']) }}" alt="product image">
                                        </figure>
                                    </div>
                                </div>
                                <!-- End Gallery -->
                                <div class="social-icons single-share">
                                    <ul class="text-grey-5 d-inline-block">
                                        <li><strong class="mr-10">Share this:</strong></li>
                                        <li class="social-facebook"><a href="#"><img src="{{ asset('user/assets/imgs/theme/icons/icon-facebook.svg') }}" alt=""></a></li>
                                        <li class="social-twitter"> <a href="#"><img src="{{ asset('user/assets/imgs/theme/icons/icon-twitter.svg') }}" alt=""></a></li>
                                        <li class="social-instagram"><a href="#"><img src="{{ asset('user/assets/imgs/theme/icons/icon-instagram.svg') }}" alt=""></a></li>
                                        <li class="social-linkedin"><a href="#"><img src="{{ asset('user/assets/imgs/theme/icons/icon-pinterest.svg') }}" alt=""></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="detail-info">
                                    <h2 class="title-detail">{{ $product[0]['product_name'] }}</h2>
                                    <div class="product-detail-rating">
                                        <div class="pro-details-brand">
                                            <span> Brands: <a href="#">{{ $item[0]['item_name'] }}</a></span>
                                        </div>
                                        <div class="product-rate-cover text-end">
                                            <span class="font-small ml-5 text-muted"> ({{ $commentCount }} reviews)</span>
                                        </div>
                                    </div>
                                    <div class="clearfix product-price-cover">
                                        <div class="product-price primary-color float-left">
                                            @if ($product[0]['discount_price'])
                                                <ins><span class="text-brand">{{ $product[0]['discount_price'] }} Ks</span></ins>
                                                <ins><span class="old-price font-md ml-15">{{ $product[0]['normal_price'] }} Ks</span></ins>
                                            @else
                                                <ins><span class="text-brand">{{ $product[0]['normal_price'] }} Ks</span></ins>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                    <div class="short-desc mb-30">
                                        <p>{{ $product[0]['long_des'] }}</p>
                                    </div>
                                    <div class="product_sort_info font-xs mb-30">
                                        <ul>
                                            <li class="mb-10"><i class="fi-rs-crown mr-5"></i> 1 Year AL Jazeera Brand Warranty</li>
                                            <li class="mb-10"><i class="fi-rs-refresh mr-5"></i> 30 Day Return Policy</li>
                                            <li><i class="fi-rs-credit-card mr-5"></i> Cash on Delivery available</li>
                                        </ul>
                                    </div>
                                    <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                    <div class="detail-extralink">
                                        <div class="product-extra-link2">
                                            <button type="button" productId="{{ $product[0]['id'] }}" class="button button-add-to-cart addToCartBtn">Add to cart</button>
                                            <a aria-label="Add To Wishlist" wishlist-product-id="{{ $product[0]['id'] }}" class="action-btn hover-up wishlistBtn"><i class="fi-rs-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Detail Info -->
                            </div>
                        </div>
                        <div class="tab-style3">
                            <ul class="nav nav-tabs text-uppercase">
                                <li class="nav-item">
                                    <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">Reviews ({{ $commentCount }})</a>
                                </li>
                            </ul>
                            <div class="tab-content shop_info_tab entry-main-content">
                                <div class="tab-pane fade show active" id="Description">
                                    <div class="">
                                        <p>
                                            Same Day Delivery ဝန်ဆောင်မှုအား (ရန်ကုန်နှင့်မန္တလေး)သာ ရရှိနိုင်ပါသည်။ အခြားမြို့များအတွက် မှာယူသည့်နေ့တွင် သက်ဆိုင်ရာ Delivery Service အပ်ပေးပါသည်။
                                            ၇ရက်အတွင်းဖြစ်ပေါ်သော မူလချို့ယွင်းမှုများ အတွက် 24နာရီ အတွင်း အာမခံအပြည့်ပါသော ပစ္စည်းများဖြင့် အစားထိုးပေးပါသည်။
                                        </p>
                                        <div class="product-more-infor mt-30 d-flex">
                                            <div class="col ps-5 text-start">
                                                <h5 class="mb-3"><span><i class="fa-solid fa-circle-info me-2" style="color: #1f64db;"></i></span>{{ $product[0]['product_name'] }}</h5>
                                                <h5 class="mb-3"><span><i class="fa-solid fa-circle-info me-2" style="color: #1f64db;"></i></span>{{ $product[0]['discount_price']? $product[0]['discount_price'] : $product[0]['normal_price'] }} Ks</h5>
                                                @if ($product[0]['des1'])
                                                    <h5 class="mb-3"><span><i class="fa-solid fa-circle-info me-2" style="color: #1f64db;"></i></span>{{ $product[0]['des1'] }}</h5>
                                                @endif
                                                @if ($product[0]['des2'])
                                                    <h5 class="mb-3"><span><i class="fa-solid fa-circle-info me-2" style="color: #1f64db;"></i></span>{{ $product[0]['des2'] }}</h5>
                                                @endif
                                            </div>
                                            <div class="col text-start">
                                                @if ($product[0]['des3'])
                                                    <h5 class="mb-3"><span><i class="fa-solid fa-circle-info me-2" style="color: #1f64db;"></i></span>{{ $product[0]['des3'] }}</h5>
                                                @endif
                                                @if ($product[0]['des4'])
                                                    <h5 class="mb-3"><span><i class="fa-solid fa-circle-info me-2" style="color: #1f64db;"></i></span>{{ $product[0]['des4'] }}</h5>
                                                @endif
                                                @if ($product[0]['des5'])
                                                    <h5 class="mb-3"><span><i class="fa-solid fa-circle-info me-2" style="color: #1f64db;"></i></span>{{ $product[0]['des5'] }}</h5>
                                                @endif
                                                @if ($product[0]['des6'])
                                                    <h5 class="mb-3"><span><i class="fa-solid fa-circle-info me-2" style="color: #1f64db;"></i></span>{{ $product[0]['des6'] }}</h5>
                                                @endif
                                            </div>
                                            <div class="col d-none d-md-block d-lg-block"></div>
                                        </div>
                                        <hr class="wp-block-separator is-style-dots">
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="Reviews">
                                    <!--Comments-->
                                    <div class="comments-area">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <h4 class="mb-30">Customer questions & answers</h4>
                                                <div class="mb-5">
                                                    <form action="{{ url('comment/add') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" value="{{ $product[0]['id'] }}" name="productId">
                                                        <label class="form-label" for="comment">Add Comment</label>
                                                        <textarea class="form-control" name="comment" placeholder="Write Comment" id="comment" rows="10" required></textarea>
                                                        <div class="text-end">
                                                            <button class="btn mt-3">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <hr>
                                                @foreach ($comment as $com)
                                                    <div class="comment-list">
                                                        <div class="single-comment justify-content-between d-flex">
                                                            <div class="user justify-content-between d-flex">
                                                                <div class="text-center col-2">
                                                                    <div style="border-radius: 50%; width:60px; height:60px; border:3px solid gray;" class=" overflow-hidden">
                                                                        <img style="object-fit:cover;" class="w-100" src="{{ asset('storage/images/profile_images/'.$com->profile_image) }}" alt="Profile Photo">
                                                                    </div>
                                                                    <h6 class="mt-2">{{ $com->name }}</h6>
                                                                </div>
                                                                <div class="desc mt-2 ms-4">
                                                                    <p>{{ $com->comment }}</p>
                                                                    <div class="d-flex justify-content-between">
                                                                        <div class="d-flex align-items-center">
                                                                            <p class="font-xs mr-30">{{ $com->created_at->diffForHumans() }} </p>
                                                                            {{-- <a href="#" class="text-brand btn-reply">Reply <i class="fi-rs-arrow-right"></i> </a> --}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-60">
                            <div class="col-12">
                                <h3 class="section-title style-1 mb-30">Related products</h3>
                            </div>
                            <div class="col-12">
                                <div class="row related-products">
                                    @foreach ($detailRelated as $dr)
                                        <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                            <div class="product-cart-wrap small hover-up">
                                                <div class="product-img-action-wrap">
                                                    <div class="product-img product-img-zoom">
                                                        <a href="{{ url('shop/detail',$dr->id) }}" tabindex="0">
                                                            <img class="default-img" src="{{ asset('storage/images/product_images/'.$dr->product_image) }}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="product-action-1">
                                                        <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-search"></i></a>
                                                        <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="wishlist.php" tabindex="0"><i class="fi-rs-heart"></i></a>
                                                        <a aria-label="Compare" class="action-btn small hover-up" href="compare.php" tabindex="0"><i class="fi-rs-shuffle"></i></a>
                                                    </div>
                                                    <div class="product-badges product-badges-position product-badges-mrg">
                                                        <span class="hot">Hot</span>
                                                    </div>
                                                </div>
                                                <div class="product-content-wrap">
                                                    <h2><a href="{{ url('shop/detail'.$dr->id) }}" tabindex="0">{{ $dr->product_name }}</a></h2>
                                                    <div class="product-price">
                                                        @if ($dr->discount_price!=null)
                                                            <span>{{ $dr->discount_price }} Ks</span>
                                                        @else
                                                            <span>{{ $dr->normal_price }} Ks</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 primary-sidebar sticky-sidebar">
                    <div class="widget-category mb-30">
                        <h5 class="section-title style-1 mb-30 wow fadeIn animated">Category</h5>
                        <ul class="categories">
                            @foreach ($categories as $c)
                                <li><a href="{{ url('shop/category',$c->id) }}">{{ $c->category_name }}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Product sidebar Widget -->
                    <div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey border-radius-10">
                        <div class="widget-header position-relative mb-20 pb-10">
                            <h5 class="widget-title mb-10">New products</h5>
                            <div class="bt-1 border-color-1"></div>
                        </div>
                        @foreach ($newProduct as $np)
                            <div class="single-post clearfix">
                                <div class="image">
                                    <img src="{{ asset('storage/images/product_images/'.$np->product_image) }}" alt="Photo">
                                </div>
                                <div class="content pt-10">
                                    <h5><a href="{{ url('shop/detail',$np->id) }}">{{ $np->product_name }}</a></h5>
                                    @if ($np->discount_price!=null)
                                        <p class="price mb-0 mt-5">{{ $np->discount_price }} Ks</p>
                                    @else
                                        <p class="price mb-0 mt-5">{{ $np->normal_price }} Ks</p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@section('userJs')
    <script>
        $(document).ready(function(){
            $product_id=$('#productId').val();
            $.ajax({
                type:'get',
                url:"{{ url('ajax/user/product/detail') }}",
                dataType:'json',
                data:{
                    'product_id':$product_id,
                },
            });

            // For Add To Cart
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
