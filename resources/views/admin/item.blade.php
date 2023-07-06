@extends('layouts.admin')
@section('item')
    active
@endsection
@section('admin')

    <div class="container py-3">
        <div class="row mb-2">
            <h3 class="text-center">Item Page</h3>
        </div>
        <div class="row d-flex justify-content-center mb-4">
            <div class="col-12 col-md-8 col-lg-6 d-flex">
                <div class="col-9 me-2">
                    <select id="selCategory" class="form-select" name="category_name" id="">
                        <option value="all">All Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-3">
                    <button type="button" class="btn bg-dark text-white nowrap" data-bs-toggle="modal" data-bs-target="#itemModal">Add Item</button>
                </div>
            </div>
        </div>
        <div class="row">
            <table class="table table-responsive">
                <thead>
                    <tr class="fw-bold fs-5">
                        <td>Id</td>
                        <td>Item Name</td>
                        <td>Date</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody id="tableItem">
                    @foreach ($item as $i)
                        <tr>
                            <td>{{ $i->id }}</td>
                            <td>{{ $i->item_name }}</td>
                            <td>{{ $i->created_at->diffForHumans() }}</td>
                            <td>
                                <a class="btn btn-danger" href="{{ url('delete/item',$i->id) }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

  <!-- Modal -->
  <div class="modal fade" id="itemModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ url('add/item') }}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Item</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <select class="form-select" name="category_id" id="">
                                <option value="0">Choose Category.....</option>
                                @foreach ($categories as $c)
                                    <option value="{{ $c->id }}">{{ $c->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold" for="name">Item Name</label>
                            <input class="form-control" type="text" name="item_name" id="name" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
  </div>

@endsection

@section('adminJs')
    <script>
        $(document).ready(function(){
            $('#selCategory').change(function(){
                $id=$(this).val();
                $.ajax({
                    type:'get',
                    url:"{{ url('ajax/category/change') }}",
                    dataType:'json',
                    data:{
                        'id':$id,
                    },
                    success:function(response){
                        $item='';
                        for($i=0; $i < response.length; $i++){
                            $item+=`
                                <tr>
                                    <td>${response[$i]['id']}</td>
                                    <td>${response[$i]['item_name']}</td>
                                    <td>${response[$i]['created_at']}</td>
                                    <td>
                                        <a class="btn btn-danger" href="{{ url('delete/item/`+ response[$i][`id`] +`') }}">Delete</a>
                                    </td>
                                </tr>
                            `;
                        }
                        $('#tableItem').html($item);
                    }
                })
            })
        })
    </script>
@endsection