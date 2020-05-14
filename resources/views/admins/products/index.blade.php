@extends('admins.layouts.app')

@section('title',' Quản lý sản phầm')

@section('content')
    <div class="d-flex  mb-4">
        <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
        @can('new product')
            <a title="Thêm mới sản phẩm" class="btn btn-outline-primary btn-circle ml-2"
               href="{{route('products.create')}}">
                <i class="fa fa-plus"></i>
            </a>
        @endcan
    </div>
    <div class="row d-flex mb-1">
        <div class="col-12 d-flex">
            <form method="get" action="{{route('products.index')}}" class=" p-1 d-flex"
                  id="subjectFormSearch">
                <div class="d-flex flex-column">
                    <lable class="text-primary" for="name">Tên tìm kiếm</lable>
                    <input value="{{request()->input('name')}}" class="h-50" type="text" placeholder="Tên tìm kiếm..."
                           name="name">
                </div>
                <div class="d-flex flex-column ml-1">
                    <lable class="text-primary" for="sale">Khuyến mãi</lable>
                    <input value="{{request()->input('sale')}}" class="h-50" type="text"
                           placeholder="khuyễn mãi %..." name="sale">
                </div>
                <div class="d-flex flex-column ml-1">
                    <lable class="text-primary" for="role">Tên danh mục</lable>
                    <select name="category" class="h-50 product-select-category " style="width: 300px">
                        <option value="">Tất cả</option>
                        @foreach($categories as $category)
                            <option
                                value="{{$category->name}}" {{(request()->input('category')==$category->name)?'selected':''}} >{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="d-flex flex-column ml-1">
                    <lable class="text-primary" for="role">Tên hãng</lable>
                    <select name="brand" class="h-50 product-select-brand " style="width: 300px">
                        <option value="">Tất cả</option>
                        @foreach($brands as $brand)
                            <option
                                value="{{$brand->name}}" {{(request()->input('brand')==$brand->name)?'selected':''}} >{{$brand->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="align-self-end ml-1">
                    <button class="btn btn-primary  aqua-gradient btn-rounded btn-sm my-0" type="submit"
                            title="Tìm kiếm">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>

            </form>
        </div>

        <div class="text-dark">
            <p class="p-2">Tổng cộng:{{$products->total()}}</p>
        </div>
    </div>
    @if(session('message'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong> {{session('message')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="row" id="product">
        <div class="col-12">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Danh mục</th>
                    <th>Thương hiệu</th>
                    <th>Khuyến mại</th>
                    <th>Tùy chọn</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td><strong></strong></td>
                        <td><img src="{{asset('/images/products/'.$product->image)}}"
                                 style="max-width: 50px;max-height: 50px;" width="100%" height="100%"
                                 alt="{{$product->name}}">
                        </td>
                        <td>{{$product->name}}</td>
                        <td>
                            @foreach($product->categories as $category)
                                <p>{{$category->name}}</p>
                            @endforeach
                        </td>
                        <td>{{$product->brand->name ?? 'NIKE'}}</td>
                        <td>{{$product->sale}}%</td>
                        <td>
                            @can('update product')
                                <a class="btn btn-circle btn-outline-warning" title="Cập nhật thông tin"
                                   href="{{route('products.edit',$product->id)}}"><i class="fa fa-pencil-alt"></i></a>
                            @endcan
                            @can('view product')
                                <button class="btn btn-circle btn-outline-info show-product" show="{{$product->id}}"
                                        data-toggle="modal" data-target="#showProductInfo"
                                        title="Thông tin chi tiết"><i class="fa fa-info"></i></button>
                            @endcan
                            @can('new product')
                                <button class="btn btn-circle btn-outline-primary add-image-product"
                                        add-image="{{$product->id}}"
                                        data-toggle="modal" data-target="#addProductImage"
                                        title="Thêm hình ảnh cho sản phẩm"><i
                                        class="fa fa-image"></i></button>
                            @endcan
                            @can('new product')
                                <button class="btn btn-circle btn-outline-primary  add-product-size"
                                        data-toggle="modal" data-target="#addProductSize"
                                        add-size="{{$product->id}}" title="Thêm kích cỡ cho sản phẩm"><i
                                        class="fas fa-sort-numeric-up-alt"></i></button>
                            @endcan
                            @can('new product')
                                <a class="btn btn-circle btn-outline-primary  "
                                   href="{{route('products.color.create',$product->id)}}"
                                   title="Thêm kích màu cho kích cỡ sản phẩm"><i
                                        class="fa fa-palette"></i></a>
                            @endcan
                            @can('delete product')
                                <button class="btn btn-circle btn-outline-danger delete-product"
                                        delete="{{$product->id}}"
                                        title="Xóa sản phầm"><i class="fa fa-trash"></i></button>
                            @endcan
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

        </div>
        <div>
            {{$products}}
        </div>
    </div>
    @include('admins.products.modal')
@endsection
