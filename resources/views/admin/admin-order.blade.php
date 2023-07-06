@extends('layouts.admin')
@section('order')
    active
@endsection
@section('admin')

    <div class="container py-3">
        <div class="row">
            <h3 class="text-center mb-3">Order Page</h3>
            <span class="mb-3">
                @if ($status=='All')
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            All Status
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('admin/order/Pending') }}">Pending</a></li>
                            <li><a class="dropdown-item" href="{{ url('admin/order/Accept') }}">Accept</a></li>
                            <li><a class="dropdown-item" href="{{ url('admin/order/Reject') }}">Reject</a></li>
                        </ul>
                    </div>
                @elseif ($status=='Pending')
                    <div class="dropdown">
                        <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Pending
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('admin/order/All') }}">All Status</a></li>
                            <li><a class="dropdown-item" href="{{ url('admin/order/Accept') }}">Accept</a></li>
                            <li><a class="dropdown-item" href="{{ url('admin/order/Reject') }}">Reject</a></li>
                        </ul>
                    </div>
                @elseif ($status=='Accept')
                    <div class="dropdown">
                        <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Accept
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('admin/order/All') }}">All Status</a></li>
                            <li><a class="dropdown-item" href="{{ url('admin/order/Pending') }}">Pending</a></li>
                            <li><a class="dropdown-item" href="{{ url('admin/order/Reject') }}">Reject</a></li>
                        </ul>
                    </div>
                @elseif ($status=='Reject')
                <div class="dropdown">
                    <button class="btn btn-danger dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Reject
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ url('admin/order/All') }}">All Status</a></li>
                        <li><a class="dropdown-item" href="{{ url('admin/order/Pending') }}">Pending</a></li>
                        <li><a class="dropdown-item" href="{{ url('admin/order/Accept') }}">Accept</a></li>
                    </ul>
                </div>
            @endif
            </span>
            <div class="col-12">
                <table class="table table-responsive-lg">
                    <thead>
                        <tr>
                            <td class="col-1">Image</td>
                            <td>P_Name</td>
                            <td>Name</td>
                            <td>Phone</td>
                            <td>Address</td>
                            <td>Price</td>
                            <td>Qty</td>
                            <td>Total Price</td>
                            <td>Status</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $o)
                        <tr>
                            <td><img class="w-100" src="{{ asset('storage/images/product_images/'.$o->product_image) }}" alt="Photo"></td>
                            <td>{{ $o->product_name }}</td>
                            <td>{{ $o->name }}</td>
                            <td>{{ $o->phone }}</td>
                            <td>{{ $o->address }}</td>
                            <td>{{ $o->discount_price? $o->discount_price : $o->normal_price }} Ks</td>
                            <td>{{ $o->qty }}</td>
                            <td>{{ ($o->discount_price? $o->discount_price : $o->normal_price) * $o->qty }} Ks</td>
                            <td>
                                @if ($o->status == 'Pending')
                                    <div class="dropdown">
                                        <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Pending
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ url('order/status/change/Accept',$o->order_id) }}">Accept</a></li>
                                            <li><a class="dropdown-item" href="{{ url('order/status/change/Reject',$o->order_id) }}">Reject</a></li>
                                        </ul>
                                    </div>
                                @elseif ($o->status == 'Accept')
                                    <div class="dropdown">
                                        <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Accept
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ url('order/status/change/Pending',$o->order_id) }}">Pending</a></li>
                                            <li><a class="dropdown-item" href="{{ url('order/status/change/Reject',$o->order_id) }}">Reject</a></li>
                                        </ul>
                                    </div>
                                @elseif ($o->status == 'Reject')
                                    <div class="dropdown">
                                        <button class="btn btn-danger dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Reject
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ url('order/status/change/Pending',$o->order_id) }}">Pending</a></li>
                                            <li><a class="dropdown-item" href="{{ url('order/status/change/Accept',$o->order_id) }}">Accept</a></li>
                                        </ul>
                                    </div>
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
