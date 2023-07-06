@extends('layouts.admin')
@section('dashboard')
    active
@endsection
@section('admin')

    <div class="container py-3">
        <div class="row my-3">
            <div class="col-12 col-md-3 col-lg-3 mb-3">
                <div class="cart shadow p-4 bg-info rounded">
                    <h3>All Item</h3>
                    <h4>{{ $item }}</h4>
                </div>
            </div>
            <div class="col-12 col-md-3 col-lg-3 mb-3">
                <div class="cart shadow p-4 bg-info rounded">
                    <h3>All Product</h3>
                    <h4>{{ $product }}</h4>
                </div>
            </div>
            <div class="col-12 col-md-3 col-lg-3 mb-3">
                <div class="cart shadow p-4 bg-info rounded">
                    <h3>User</h3>
                    <h4>{{ $user }}</h4>
                </div>
            </div>
            <div class="col-12 col-md-3 col-lg-3 mb-3">
                <div class="cart shadow p-4 bg-info rounded">
                    <h3>Order</h3>
                    <h4>{{ $order }}</h4>
                </div>
            </div>
        </div>
        <hr>
        <div class="row my-3">
            <div class="col">
                <h5>Admin List</h5>
                <table class=" table">
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Phone</td>
                            <td>Address</td>
                            <td>Status</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($adminList as $al)
                            <tr>
                                <td>{{ $al->name }}</td>
                                <td>{{ $al->email }}</td>
                                <td>{{ $al->phone }}</td>
                                <td>{{ $al->address }}</td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
