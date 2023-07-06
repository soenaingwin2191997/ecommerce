@extends('layouts.admin')

@section('showProduct')
    active    
@endsection
@section('admin')

    <div class="container py-3">
        <div class="row">
            <div class="col-12 d-flex justify-content-center mb-3">
                <div class="col-12 col-md-8 col-lg-6">
                    <select id="selCategory" name="category_id" class="form-select" aria-label="Default select example">
                        <option value="0">All Catagory...........</option>
                        @foreach ($categories as $c)
                            <option value="{{ $c->id }}">{{ $c->category_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-center mb-3">
                <div class="col-12 col-md-8 col-lg-6">
                    <select id="selItem" class="form-select" name="item_id" aria-label="Default select example">
                        <option value="0">All Item.........</option>
                        @foreach ($items as $i)
                            <option value="{{ $i->id }}">{{ $i->item_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12">
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <td class="col-1">Image</td>
                            <td>Name</td>
                            <td>Price</td>
                            <td>Discount Price</td>
                            <td>Action</td>

                        </tr>
                    </thead>
                    <tbody id="showProductTable">
                        @foreach ($products as $p)
                        <tr>
                            <td>
                                @if ($p->product_image!=null)
                                    <img class="w-100" src="{{ asset('storage/images/product_images/'.$p->product_image) }}" alt="{{ $p->product_image }}">
                                @else
                                    <img class="w-100" src="{{ asset('storage/images/404-images/no_image-available.png') }}" alt="Image No Found">
                                @endif
                            </td>
                            <td>{{ $p->product_name }}</td>
                            <td>{{ $p->normal_price }}</td>
                            <td>{{ $p->discount_price }}</td>
                            <td>
                                <a href="{{ url('detail/product',$p->id) }}"><i class="fa-regular fa-eye"></i></a> |
                                <a href="{{ url('delete/product',$p->id) }}"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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
                    url:"{{ url('ajax/show-product/category') }}",
                    dataType:'json',
                    data:{
                        'id':$id,
                    },
                    success:function(response){
                        $list='';
                        $table='';
                        for($i=0; $i < response[0].length; $i++){
                            $list+=`
                                <option value="${response[0][$i]['id']}">${response[0][$i]['item_name']}</option>
                            `;
                        }
                        $('#selItem').html($list);

                        for($j=0; $j<response[1].length; $j++){
                            if(response[1][$j]['product_image']!=null){
                                $image="storage/images/product_images/"+response[1][$j]['product_image'];
                            }else{
                                $image="storage/images/404-images/no_image-available.png";
                            }
                            $table+=`
                                <tr>
                                    <td>
                                        <img class="w-100" src="{{ asset('${$image}') }}" alt="Photo">
                                    </td>
                                    <td>${response[1][$j]['product_name']}</td>
                                    <td>${response[1][$j]['normal_price']}</td>
                                    <td>${response[1][$j]['discount_price']}</td>
                                    <td>
                                        <a href="{{ url('detail/product/`+ response[1][$j][`id`] +`') }}"><i class="fa-regular fa-eye"></i></a> |
                                        <a href="{{ url('delete/product/`+ response[1][$j][`id`] +`') }}"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                            `;
                        }
                        $('#showProductTable').html($table);
                    }
                });
            });

            $('#selItem').change(function(){
                $id=$(this).val();
                $.ajax({
                    type:'get',
                    url:"{{ url('ajax/show-product/item') }}",
                    dataType:'json',
                    data:{
                        'id':$id,
                    },
                    success:function(response){
                        $table='';
                        for($j=0; $j<response.length; $j++){
                            if(response[$j]['product_image']!=null){
                                $image="storage/images/product_images/"+response[$j]['product_image'];
                            }else{
                                $image="storage/images/404-images/no_image-available.png";
                            }
                            $table+=`
                                <tr>
                                    <td>
                                        <img class="w-100" src="{{ asset('${$image}') }}" alt="Image">
                                    </td>
                                    <td>${response[$j]['product_name']}</td>
                                    <td>${response[$j]['normal_price']}</td>
                                    <td>${response[$j]['discount_price']}</td>
                                    <td>
                                        <a href="{{ url('detail/product/`+ response[$j][`id`] +`') }}"><i class="fa-regular fa-eye"></i></a> |
                                        <a href="{{ url('delete/product/`+ response[$j][`id`] +`') }}"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                            `;
                        }
                        $('#showProductTable').html($table);
                    }
                });
            });
        });
        
    </script>
@endsection