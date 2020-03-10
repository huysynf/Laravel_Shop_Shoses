@extends('admins.layouts.app')

@section('title',__('content.category'))

@section('content')
    <div class="d-flex  mb-4">
        <h1 class="h3 mb-0 text-gray-800">@lang('content.category')</h1>
        @can('new category')
        <button title="@lang('content.add-new') @lang('content.category')" class="btn btn-outline-primary btn-circle ml-2 add-category" data-toggle="modal" data-target="#newCategoryModal">
            <i class="fa fa-plus"></i>
        </button>
        @endcan
        <a title="thùng rác" href="{{route('categories.trash')}}" class="btn btn-outline-danger btn-circle ml-2 " >
            <i class="fa fa-trash"></i>
        </a>
    </div>
    <div class="row d-flex mb-1">
        <div class="search-box">
            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="{{route('categories.index')}}" method="get">
                <div class="input-group">
                    <input type="text" class="form-control bg-light  small" placeholder="Nhập tên để tìm kiếm..." aria-label="Search" aria-describedby="basic-addon2" name="searchKey" value="{{request()->input('searchKey')}}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" title="Tìm kiếm ">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="text-dark">
            <p class="p-2">@lang('content.total'):{{$categories->total()}}</p>
        </div>
    </div>
    <div class="row" id="category">
        <div class="col-12">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>@lang('content.category')</th>
                    <th>@lang('content.parent-category')</th>
                    <th>@lang('content.action')</th>
                </tr>
                </thead>
                <tbody>
                    @foreach( $categories as $category)
                        <tr>
                            <td><strong></strong></td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->category->name??'không có'}}</td>
                            <td>
                                @can('update category')
                                <a href="#"
                                   class="btn btn-circle btn-outline-warning edit-category"
                                   title="Cập nhật thông tin"
                                   edit-id="{{$category->id}}"
                                   data-toggle="modal"
                                   data-target="#editCategoryModal"
                                >
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                @endcan
                                @can('delete category')
                                <button title="Xóa "
                                        class="btn btn-circle btn-outline-danger delete-category"
                                        delete-id="{{$category->id}}"

                                >
                                    <i class="fas fa-times"></i>
                                </button>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <div>
            {{$categories->links()}}
        </div>
    </div>
    @include('admins.categories.form')
@endsection
