@extends('layouts.admin')
@section('user-list')
    active
@endsection
@section('admin')

    <div class="container py-3">
        <div class="row">
            <div class="col-12 d-flex justify-content-center my-3">
                <div class="col-10 col-md-4 col-lg-4">
                    <form class="d-flex" action="">
                        <input class="form-control" placeholder="Search Name or Phone Number" type="text" name="">
                        <button class="btn btn-info ms-2" type="submit">Search</button>
                    </form>
                </div>
            </div>
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Phone Number</td>
                            <td>Date</td>
                            <td>Status</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->created_at->diffForHumans() }}</td>
                            <td>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">Active</option>
                                    <option value="2">Delete</option>
                                    <option value="3">Block</option>
                                  </select>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
