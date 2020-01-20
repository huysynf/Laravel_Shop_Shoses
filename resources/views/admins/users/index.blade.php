@extends('admins.layouts.app')

@section('title',' Quản lý sản phầm')

@section('content')
    <div class="d-flex  mb-4">
        <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
        <a title="Thêm mới sản phẩm" class="btn btn-outline-primary btn-circle ml-2"   href="{{route('users.create')}}">
            <i class="fa fa-plus"></i>
        </a>
    </div>
    <div class="row d-flex mb-1">
        <div class="col-12 d-flex">
            <form method="get" action="{{route('users.index')}}" class=" p-1 d-flex"
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

                    </select>
                </div>
                <div class="d-flex flex-column ml-1">
                    <lable class="text-primary" for="role">Tên hãng</lable>
                    <select name="brand" class="h-50 product-select-brand " style="width: 300px">
                        <option value="">Tất cả</option>

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
{{--            <p class="p-2">Tổng cộng:{{$products->total()}}</p>--}}
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

                </tbody>
            </table>

        </div>
        <div>

        </div>
    </div>
@endsection
