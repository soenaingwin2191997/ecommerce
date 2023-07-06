@extends('layouts.user')
@section('order')
    active
@endsection

@section('user')
    <div class="container">
        <div class="row p-4">
            <div class="page-header breadcrumb-wrap mb-4">
                <div class="container">
                    <div class="breadcrumb">
                        <a href="{{ url('user/page') }}" rel="nofollow">Home</a>
                        <span></span> <a href="{{ url('shop/page') }}">Shop</a>
                        <span></span> Your Order
                    </div>
                </div>
            </div>
            <div class="col">
                <table lang="table">
                    <thead>
                        <tr>
                            <td class="col-1">Image</td>
                            <td>Name</td>
                            <td>Price</td>
                            <td>Quantity</td>
                            <td>Total Price</td>
                            <td>Status</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $o)
                        <tr>
                            <td><img src="{{ asset('storage/images/product_images/'.$o->product_image) }}" alt="Photo"></td>
                            <td><a href="{{ url('shop/detail',$o->id) }}">{{ $o->product_name }}</a></td>
                            <td>{{ $o->discount_price? $o->discount_price : $o->normal_price }} Ks</td>
                            <td>{{ $o->qty }}</td>
                            <td>{{ ($o->discount_price? $o->discount_price : $o->normal_price) * $o->qty }} Ks</td>
                            <td>
                                @if ($o->status == 'Pending')
                                    <span class="bg-info px-3 text-dark py-2 rounded">{{ $o->status }}</span>
                                @elseif ($o->status =='Accept')
                                    <span class="bg-success text-dark px-3 py-2 rounded">{{ $o->status }}</span>
                                @elseif ($o->status =='Reject')
                                    <span class="bg-danger text-dark px-3 py-2 rounded">{{ $o->status }}</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
