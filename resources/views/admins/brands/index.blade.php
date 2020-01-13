@extends('admins.layouts.app')

@section('title',' Quản lý thương hiệu')

@section('content')
    <div class="d-flex  mb-4">
        <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
        <a title="Thêm mới thương hiệu"
           data-toggle="modal" data-target="#BrandModal"
           class="btn btn-outline-primary btn-circle ml-2 add-brand"  >
            <i class="fa fa-plus"></i>
        </a>
    </div>
    <div class="row d-flex mb-1">
        <div class="col-12 d-flex">
            <form method="get" action="{{route('brands.index')}}" class=" p-1 d-flex"
                  id="subjectFormSearch">
                <div class="d-flex flex-column">
                    <lable class="text-primary" for="name">Tên tìm kiếm</lable>
                    <input value="{{request()->input('name')}}" class="h-50" type="text" placeholder="Tên tìm kiếm..."
                           name="name">
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
            <p class="p-2">Tổng cộng:{{$brands->total()}}</p>
        </div>
    </div>
    <div class="row" id="brand">
        <div class="col-12">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Ảnh</th>
                    <th>Tên thương hiệu</th>
                    <th>Tùy chọn</th>
                </tr>
                </thead>
                <tbody>
                @foreach($brands as $brand)
                    <tr>
                        <td><strong></strong></td>
                        <td><img src="{{asset('/images/brands/'.$brand->image)}}"
                                 style="max-width: 50px;max-height: 50px;" width="100%" height="100%"
                                 alt="{{$brand->name}}">
                        </td>
                        <td>{{$brand->name}}</td>
                        <td>
                            <button class="btn btn-circle btn-outline-primary  edit-brand"
                                    data-toggle="modal" data-target="#editBrandModal"
                                    edit="{{$brand->id}}" title="Cập nhật thông tin"><i
                                    class="fa fa-pen"></i></button>
                            <button class="btn btn-circle btn-outline-danger delete-brand" delete="{{$brand->id}}"
                                    title="Xóa sản phầm"><i class="fa fa-times"></i></button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
        <div>
            {{$brands}}
        </div>
    </div>

    @include('admins.brands.modal')
@endsection
