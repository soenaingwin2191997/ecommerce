@extends('layouts.admin')
@section('category')
    active
@endsection
@section('admin')

    <div class="container py-3">
        <div class="row mb-2">
            <h3 class="text-center">Category Page</h3>
        </div>
        <div class="row d-flex justify-content-center mb-4 me-3">
            <form class="d-flex col-12 col-md-8 col-lg-6" action="{{ url('add/category') }}" method="post">
                @csrf
                <div class="col-10">
                    <input class="form-control" type="text" name="category_name" id="" required>
                </div>
                <div class="col-2 ms-2">
                    <input class="btn bg-dark px-3 text-white" type="submit" value="Save">
                </div>
            </form>
        </div>
        <div class="row">
            <table class="table table-responsive">
                <thead>
                    <tr class="fw-bold fs-5">
                        <td>Id</td>
                        <td>Category Name</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $c)
                        <tr>
                            <td>{{ $c->id }}</td>
                            <td>{{ $c->category_name }}</td>
                            <td>
                                <a class="btn btn-danger" href="{{ url('delete/category',$c->id) }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection