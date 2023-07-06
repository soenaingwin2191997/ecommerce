@extends('layouts.admin')
@section('showProduct')
    active
@endsection
@section('admin')

    <div class="container py-3">
        <form class="row" action="{{ url('update/product') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-12 col-md-6 col-lg-6 mt-5">
                <div class="cart">
                    <div class="cart-body">
                        <div class="mb-3">
                            <select id="selCategory" name="category_id" class="form-select" aria-label="Default select example">
                                <option value="0">Select Catagory...........</option>
                                @foreach ($categories as $c)
                                    <option value="{{ $c->id }}" {{ $product[0]['category_id']==$c->id ? 'selected' : '' }}>{{ $c->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <select id="selItem" class="form-select" name="item_id" aria-label="Default select example">
                                <option value="0">Select Item.........</option>
                                @foreach ($items as $i)
                                    <option value="{{ $i->id }}" {{ $product[0]['item_id']==$i->id? 'selected': '' }}>{{ $i->item_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-block d-md-block d-lg-flex">
                            <div class="col-12 col-md-12 col-lg-6 p-2">
                                <div class="mb-3">
                                    <label class="form-label" for="des1">Des1</label>
                                    <input class="form-control" value="{{ $product[0]['des1'] }}" type="text" name="des1" id="des1">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="des2">Des2</label>
                                    <input class="form-control" value="{{ $product[0]['des2'] }}" type="text" name="des2" id="des2">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="des3">Des3</label>
                                    <input class="form-control" value="{{ $product[0]['des3'] }}" type="text" name="des3" id="des3">
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-6 p-2">
                                <div class="mb-3">
                                    <label class="form-label" for="des4">Des4</label>
                                    <input class="form-control" value="{{ $product[0]['des4'] }}" type="text" name="des4" id="des4">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="des5">Des5</label>
                                    <input class="form-control" value="{{ $product[0]['des5'] }}" type="text" name="des5" id="des5">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="des6">Des6</label>
                                    <input class="form-control" value="{{ $product[0]['des6'] }}" type="text" name="des6" id="des6">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="longDes">Long Descripton</label>
                            <textarea class="form-control" placeholder="Enter Description................" name="long_des" id="longDes" rows="5" required>
                                {{ $product[0]['long_des'] }}
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <input type="hidden" name="product_id" value="{{ $product[0]['id'] }}">
                <div class="mb-3">
                    <div class="cart d-flex justify-content-center mb-2">
                        @if ($product[0]['product_image']!=null)
                            <img style="width: 60%;" id="productImg" src="{{ asset('storage/images/product_images/'.$product[0]['product_image']) }}" alt="Photo">
                        @else
                            <img style="width: 60%;" id="productImg" src="{{ asset('storage/images/404-images/image_no_found.jpg') }}" alt="Image No Found">
                        @endif
                    </div>
                    <input id="productInput" name="product_image" class="form-control" type="file" accept="image/jpeg,image/png,image/jpg,image/jfif" name="product_image">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="productName">Product Name</label>
                    <input class="form-control" value="{{ $product[0]['product_name'] }}" type="text" name="product_name" id="productName" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="normalPrice">Normal Price</label>
                    <input class="form-control" value="{{ $product[0]['normal_price'] }}" type="number" name="normal_price" id="normalPrice" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="discountPrice">Discount Price</label>
                    <input class="form-control" value="{{ $product[0]['discount_price'] }}" type="number" name="discount_price" id="discountPrice">
                </div>
                <input class="btn bg-dark text-white float-end" type="submit" value="Update">
            </div>
        </form>
    </div>
@endsection
@section('adminJs')
    <script>
        $(document).ready(function(){
            $('#selCategory').change(function(){
                $id=$(this).val();
                $.ajax({
                    type:'get',
                    url:"{{ url('ajax/add-product/category') }}",
                    dataType:'json',
                    data:{
                        'id':$id,
                    },
                    success:function(response){
                        $list='';
                        for($i=0; $i < response.length; $i++){
                            $list+=`
                                <option value="${response[$i]['id']}">${response[$i]['item_name']}</option>
                            `;
                        }
                        $('#selItem').html($list);
                    }
                });
            });

            $('#productInput').change(function(){
                $('#productImg').attr('src',URL.createObjectURL(this.files[0]));
            });
        });
        
    </script>
@endsection