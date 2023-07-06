<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <div class="container-fluid">
        <div class="row sticky-top bg-white">
            <nav class="navbar navbar-expand d-flex border-bottom shadow px-4">
                <a href="#" class="navbar-brand">
                    <h3>App</h3>
                </a>
                <div class="flex-fill">
                    <button class="btn d-md-none d-lg-none" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fa-solid fa-sliders"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <button class="btn border-0 dropdown-toggle" data-bs-toggle="dropdown"><i class="fa-regular fa-user"></i></button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li class="dropdown-item">
                                <a href="#" class="nav-link m-0 p-0">
                                    <i class="fa-solid fa-user me-2"></i>
                                    Profile
                                </a>
                            </li><hr class="p-0 m-0">
                            <li class="dropdown-item">
                                <form class="nav-link m-0 p-0" action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button class="border-0 bg-white" type="submit"><i class="fa-solid fa-right-from-bracket"></i> Lot Out</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="row">
            <div class="col-2 d-none position-fixed d-md-block d-lg-block p-0">
                <div style="height: 100vh" class="w-100 overflow-auto p-2">
                    <div class="list-group my-2 text-center">
                        <a href="{{ url('admin/page') }}" class="list-group-item list-group-item-action px-0 @yield('dashboard')">
                            <i class="fa-solid fa-house me-2"></i>Dashboard
                        </a>
                        <a href="{{ url('category/page') }}" class="list-group-item list-group-item-action px-0 @yield('category')">
                            Category
                        </a>
                        <a href="{{ url('item/page') }}" class="list-group-item list-group-item-action px-0 @yield('item')">
                            Item
                        </a>
                        <a href="{{ url('add/product/page') }}" class="list-group-item list-group-item-action px-0 @yield('addProduct')">
                            Add Product
                        </a>
                        <a href="{{ url('show-product/page') }}" class="list-group-item list-group-item-action px-0 @yield('showProduct')">
                            Show Product
                        </a>
                    </div>
                    <div class="list-group my-2 text-center">
                        <a href="{{ url('admin/order/page') }}" class="list-group-item list-group-item-action px-0 @yield('order')">
                            Order
                        </a>
                        <a href="{{ url('user-list/page') }}" class="list-group-item list-group-item-action px-0 @yield('user-list')">
                            User List
                        </a>
                        <a href="#" class="list-group-item list-group-item-action px-0">
                            Dashboard
                        </a>
                        <a href="#" class="list-group-item list-group-item-action px-0">
                            Dashboard
                        </a>
                    </div>
                </div>
            </div>
            <div class="col offset-md-2 offset-lg-2 col-md-10 col-lg-10">
                @yield('admin')
            </div>
        </div>
    </div>
    <!-- Mobile Side Bar -->
    <div class="offcanvas offcanvas-start" style="width: 160px;" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="w-100">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">App</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body p-0">
                <div style="height: 100vh;" class="w-100 overflow-auto p-2">
                    <div class="list-group text-center my-2">
                        <a href="{{ url('admin/page') }}" class="list-group-item list-group-item-action @yield('dashboard')">
                            Dashboard
                        </a>
                        <a href="{{ url('category/page') }}" class="list-group-item list-group-item-action @yield('category')">
                            Category
                        </a>
                        <a href="{{ url('item/page') }}" class="list-group-item list-group-item-action @yield('item')">
                            Item
                        </a>
                        <a href="{{ url('add/product/page') }}" class="list-group-item list-group-item-action @yield('addProduct')">
                            Add Product
                        </a>
                        <a href="{{ url('show-product/page') }}" class="list-group-item list-group-item-action @yield('showProduct')">
                            Show Product
                        </a>
                    </div>
                    <div class="list-group text-center my-2">
                        <a href="{{ url('admin/order/page') }}" class="list-group-item list-group-item-action @yield('order')">
                            Order
                        </a>
                        <a href="{{ url('user-list/page') }}" class="list-group-item list-group-item-action @yield('user-list')">
                            User List
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            Dashboard
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            Dashboard
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    {{-- Jquery CDN --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- Toastr --}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    @if (Session::has('message'))
        <script>
            toastr.options={
                "progressBar":true,
                "closeButton":true,
            }
            toastr.success("{{ session::get('message') }}");
        </script>
    @endif

</body>
@yield('adminJs')
</html>
