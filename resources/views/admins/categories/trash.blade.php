@extends('admins.layouts.app')

@section('title',' dashboard')

@section('content')
    <div class="d-flex  mb-4">
        <h1 class="h3 mb-0 text-gray-800">Thùng rác của danh mục</h1>
        <a title="Quay lại rang quản lý" href="{{route('categories.index')}}" class="btn btn-outline-primary btn-circle ml-2" >
            <i class="fa fa-backward"></i>
        </a>
{{--        <a title="Phục hồi tất cả" href="{{route('categories.trash.restore.all')}}" class="btn btn-outline-danger btn-circle ml-2" >--}}
{{--            <i class="fa fa-undo"></i>--}}
{{--        </a>--}}
{{--        <a title="Dọn thùng rác" href="{{route('categories.trash.deleteAll')}}" class="btn btn-outline-danger btn-circle ml-2 ">--}}
{{--            <i class="fas fa-eraser"></i>--}}
{{--        </a>--}}
    </div>
    <div class="row d-flex mb-1">
        <div class="search-box">
            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="{{route('categories.trash')}}" method="get">
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
            <p class="p-2">Tổng cộng:{{$categories->total()??''}}</p>
        </div>
    </div>
    <div class="row" id="category">
        <div class="col-12">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên danh mục</th>
                    <th>Dannh mục cha</th>
                    <th>Tùy chọn</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $categories as $category)
                    <tr>
                        <td><strong></strong></td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->category->name??'không có'}}</td>
                        <td>
                            <button title="Phục hồi "
                                    class="btn btn-circle btn-outline-danger restore-category"
                                    restore-id="{{$category->id}}"

                            >
                                <i class="fas fa-undo"></i>
                            </button>
                            <button title="Xóa luôn"
                                    class="btn btn-circle btn-outline-danger remove-category"
                                    delete-id="{{$category->id}}"
                            >
                                <i class="fas fa-times"></i>
                            </button>

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
@endsection
