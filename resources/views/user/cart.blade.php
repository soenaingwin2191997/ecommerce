@extends('layouts.user')
@section('cart')
    active
@endsection

@section('user')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ url('user/page') }}" rel="nofollow">Home</a>
                <span></span> <a href="{{ url('shop/page') }}">Shop</a>
                <span></span> Your Cart
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table shopping-summery text-center clean">
                            <thead>
                                <tr class="main-heading">
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Subtotal</th>
                                    <th scope="col">Remove</th>
                                </tr>
                            </thead>
                            <tbody id="dataTable">
                                @foreach ($carts as $c)
                                    <tr>
                                        <input type="hidden" id="productId" value="{{ $c->product_id }}">
                                        <td class="image product-thumbnail"><img src="{{ asset('storage/images/product_images/'.$c->product_image) }}" alt="Photo"></td>
                                        <td class="product-des product-name">
                                            <h5 class="product-name"><a href="{{ url('shop/detail',$c->product_id) }}">{{ $c->product_name }}</a></h5>
                                        </td>
                                        <td class="price" data-title="Price"><span id="price" class="price{{ $c->product_id }}">{{ $c->discount_price? $c->discount_price : $c->normal_price }} Ks</span></td>
                                        <td class="text-center" data-title="Stock">
                                            <div class="d-flex">
                                                <button btnId="{{ $c->product_id }}" type="button" class="btn btn-sm btnMinus"><i class="fa-solid fa-minus"></i></button>
                                                <input style="width: 40px;" id="qty" class="mx-2 p-0 text-center productQty{{ $c->product_id }}" value="{{ $c->quantity }}" type="text" name="quantity">
                                                <button btnId="{{ $c->product_id }}" type="button" class="btn btn-sm btnPlus"><i class="fa-solid fa-plus"></i></button>
                                            </div>
                                        </td>
                                        <td class="text-right" data-title="Cart">
                                            <span id="cartTotal" class="total{{ $c->product_id }}">{{ $c->discount_price? $c->discount_price : $c->normal_price * $c->quantity }} Ks </span>
                                        </td>
                                        <td class="action" data-title="Remove"><a href="{{ url('delete/cart',$c->product_id) }}" class="text-danger fs-5"><i class="fi-rs-trash"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tr>
                                <td colspan="6" class="text-end">
                                    <a href="{{ url('clear/cart') }}" class="text-danger"> <i class="fi-rs-cross-small"></i> Clear Cart</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div>
                    <form action="#" method="get">
                        @csrf
                        <div class="row mb-50">
                            <div class="col-lg-6 col-md-12 mb-4">
                                <div class="border p-md-4 p-30 border-radius cart-totals">
                                    <input type="hidden" id="userId" value="{{ Auth::user()->id }}">
                                    <div class="mb-3">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone">Phone</label>
                                        <input type="number" name="phone" id="phone" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="address">Address</label>
                                        <input type="text" name="address" id="address" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="border p-md-4 p-30 border-radius cart-totals">
                                    <div class="heading_s1 mb-3">
                                        <h4>Cart Totals</h4>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td class="cart_total_label">Cart Subtotal</td>
                                                    <td class="cart_total_amount"><span id="subTotal" class="font-lg fw-900 text-brand">{{ $finalTotal }} Ks</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="cart_total_label">Delivery</td>
                                                    <td class="cart_total_amount"> <i class="ti-gift mr-5"></i> 3500 Ks</td>
                                                </tr>
                                                <tr>
                                                    <td class="cart_total_label">Total</td>
                                                    <td class="cart_total_amount"><strong><span id="finalTotal" class="font-xl fw-900 text-brand">{{ $finalTotal + 3500 }} Ks</span></strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <button type="submit" id="processToCheckOutBtn" class="btn"> <i class="fi-rs-box-alt mr-10"></i> Proceed To CheckOut</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@section('userJs')
    <script>
        $(document).ready(function(){
            $('.btnPlus').click(function(){
                $id=$(this).attr('btnId');
                $price=$(`.price`+ $id +``).text().replace('Ks','');
                $val=$(`.productQty`+ $id +``).val();
                $(`.productQty`+ $id +``).val(Number($val) + 1);
                $(`.total`+ $id +``).text($price * (Number($val) + 1)+" Ks");

                // For Total
                $totalPrice=0;
                $('#dataTable tr').each(function (index,row) {
                    $totalPrice += Number($(row).find('#cartTotal').text().replace('Ks',''));
                  });
                  $('#subTotal').text($totalPrice+" Ks");
                  $('#finalTotal').text(($totalPrice + 3500)+" Ks");
            });

            $('.btnMinus').click(function(){
                $id=$(this).attr('btnId');
                $price=$(`.price`+ $id +``).text().replace('Ks','');
                $val=$(`.productQty`+ $id +``).val();
                if($val > 1){
                    $(`.productQty`+ $id +``).val(Number($val) - 1);
                    $(`.total`+ $id +``).text($price * (Number($val) - 1)+" Ks");

                    // For Total
                    $totalPrice=0;
                    $('#dataTable tr').each(function (index,row) {
                        $totalPrice += Number($(row).find('#cartTotal').text().replace('Ks',''));
                    });
                    $('#subTotal').text($totalPrice+" Ks");
                    $('#finalTotal').text(($totalPrice + 3500)+" Ks");
                }
            })

            // For Order
            $('#processToCheckOutBtn').click(function(){
                if($('#name').val()!="" && $('#phone').val()!="" && $('#address').val()!="" ){
                    $name=$('#name').val();
                    $phone=$('#phone').val();
                    $address=$('#address').val();
                    $orderList=[];
                    $('#dataTable tr').each(function (index,row) {
                        $orderList.push({
                            'user_id':Number($('#userId').val()),
                            'product_id':Number($(this).find('#productId').val()),
                            'name':$name,
                            'phone':$phone,
                            'address':$address,
                            'qty':Number($(this).find('#qty').val()),
                            'price':Number($(this).find('#price').text().replace('Ks','')),
                        });
                    });

                    $.ajax({
                        type:'get',
                        url:"{{ url('ajax/add/order') }}",
                        dataType:'json',
                        data:{
                            'order':$orderList,
                            },
                        success:function(response){
                            console.log(response);
                        }
                    });
                }
            });
        });
    </script>
@endsection
