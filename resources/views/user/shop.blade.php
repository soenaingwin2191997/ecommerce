@extends('layouts.user')
@section('shopPage')
    active
@endsection
@section('user')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ url('user/page') }}" rel="nofollow">Home</a>
                <span></span> Shop
            </div>
            <div class=" float-end">
                <span class=" fs-6">
                    <a href="{{ url('cart/page') }}"><i class="fa-solid fa-cart-shopping me-1"></i>Cart</a>
                    <span class="badge text-dark bg-secondary">{{ $cart }}</span>
                </span>
                <span class="fs-6 ms-2">
                    <a href="{{ url('order/page') }}"><i class="fa-solid fa-truck-fast me-1"></i>Order</a>
                    <span class="badge text-dark bg-secondary">{{ $order }}</span>
                </span>
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="shop-product-fillter">
                        <div class="totall-product">
                            <p> We found <strong class="text-brand">{{ $allProduct }}</strong> items for you!</p>
                        </div>
                        <div class="sort-by-product-area">
                            <div class="sort-by-cover">
                                <div class="sort-by-product-wrap">
                                    <div class="sort-by">
                                        <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                                    </div>
                                    <div class="sort-by-dropdown-wrap">
                                        <span> Featured <i class="fi-rs-angle-small-down"></i></span>
                                    </div>
                                </div>
                                <div class="sort-by-dropdown">
                                    <ul>
                                        <li><a class="active" href="#">Featured</a></li>
                                        <li><a href="#">Price: Low to High</a></li>
                                        <li><a href="#">Price: High to Low</a></li>
                                        <li><a href="#">Release Date</a></li>
                                        <li><a href="#">Avg. Rating</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row product-grid-3">
                        @foreach ($products as $p)
                            <div class="col-lg-4 col-md-4 col-6 col-sm-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{ url('shop/detail',$p->id) }}">
                                                <img class="default-img" src="{{ asset('storage/images/product_images/'.$p->product_image) }}" alt="Product Image">
                                            </a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">Hot</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <h2><a href="{{ url('shop/detail',$p->id) }}">{{ $p->product_name }}</a></h2>
                                        <div class="product-price">
                                            @if ($p->discount_price!=null)
                                                <span>{{ $p->discount_price }} Ks</span>
                                                <span class="old-price">{{ $p->normal_price }} Ks</span>
                                            @else
                                                <span>{{ $p->normal_price }} Ks</span>
                                            @endif
                                        </div>
                                        <div class="product-action-1 show">
                                            <button type="button" productId="{{ $p->id }}" aria-label="Add To Cart" class="action-btn hover-up addToCartBtn" ><i class="fi-rs-shopping-bag-add"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!--pagination-->
                    <div class="float-end mb-4">
                        {{ $products->links() }}
                    </div>
                </div>
                <div class="col-lg-3 primary-sidebar sticky-sidebar">
                    <div class="row">
                        <div class="col-lg-12 col-mg-6"></div>
                        <div class="col-lg-12 col-mg-6"></div>
                    </div>
                    <div class="widget-category mb-30">
                        <h5 class="section-title style-1 mb-30 wow fadeIn animated">Category</h5>
                        <ul class="categories">
                            <li><a href="{{ url('shop/page') }}">All Product</a></li>
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
                        @foreach ($shopNewProduct as $snp)
                            <div class="single-post clearfix">
                                <div class="image">
                                    <img src="{{ asset('storage/images/product_images/'.$snp->product_image) }}" alt="Photo">
                                </div>
                                <div class="content pt-10">
                                    <h5><a href="product-details.html">{{ $snp->product_name }}</a></h5>
                                    <p class="price mb-0 mt-5">{{ $snp->discount_price? $snp->discount_price : $snp->normal_price }} Ks</p>
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
        });
    </script>
@endsection
