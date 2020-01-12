@extends('admins.layouts.app')

@section('title',' Quản lý sản phầm')

@section('content')
    <div class="d-flex  mb-4">
        <h1 class="h3 mb-0 text-gray-800">Sản phẩm</h1>
        <a title="Thêm mới sản phẩm" class="btn btn-outline-primary btn-circle ml-2"   href="{{route('products.create')}}">
            <i class="fa fa-plus"></i>
        </a>
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
                <div class="align-self-end ml-1">
                    <button class="btn btn-primary  aqua-gradient btn-rounded btn-sm my-0" type="submit"
                            title="Tìm kiếm">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>

            </form>
        </div>

        <div class="text-dark">
            <p class="p-2">Tổng cộng:</p>
        </div>
    </div>
    <div class="row" id="category">
        <div class="col-12">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Danh mục</th>
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
                        <td>{{$product->sale}}%</td>
                        <td>
                            <button class="btn btn-circle btn-outline-warning"><i class="fa fa-pencil-alt"></i></button>
                            <button class="btn btn-circle btn-outline-warning"><i class="fa fa-info"></i></button>
                            <button class="btn btn-circle btn-outline-warning"><i class="fa fa-image"></i></button>
                            <button class="btn btn-circle btn-outline-warning"><i class="fa fa-s"></i></button>
                            <button class="btn btn-circle btn-outline-warning"><i class="fa fa-trash"></i></button>
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
@endsection
