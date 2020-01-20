@extends('admins.layouts.app')

@section('title',' Quản lý slider')

@section('content')
    <div class="d-flex  mb-4">
        <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
        <a title="Thêm mới mã giảm giá"
           href="{{route('slides.create')}}"
           class="btn btn-outline-primary btn-circle ml-2 add-brand"  >
            <i class="fa fa-plus"></i>
        </a>
    </div>
    @if(session('message'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong> {{session('message')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="row d-flex mb-1">
        <div class="col-12 d-flex">
            <form method="get" action="{{route('slides.index')}}" class=" p-1 d-flex"
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
{{--            <p class="p-2">Tổng cộng:{{$slides->total()}}</p>--}}
        </div>
    </div>
    <div class="row" id="coupon">
        <div class="col-12">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Code</th>
                    <th>Thể loại</th>
                    <th>Giá trị</th>
                    <th>Ngày hết hạn</th>
                    <th>Trạng thái </th>
                    <th>Số lượng </th>
                    <th>Tùy chọn</th>
                </tr>
                </thead>
                <tbody>
{{--                @foreach($coupons as $coupon)--}}
{{--                    <tr>--}}
{{--                        <th><strong></strong></th>--}}
{{--                        <th>{{$coupon->code}}</th>--}}
{{--                        <th>{{$coupon->type=='percent'?'Phần trăm':'tiềm mặt'}}</th>--}}
{{--                        <th>{{$coupon->type=='percent'?$coupon->value.' %':number_format($coupon->value).'VND'}}</th>--}}
{{--                        <th>{{$coupon->expiry_date}}</th>--}}
{{--                        <th>{{$coupon->status==0?'Hết hạn':'Còn'}} </th>--}}
{{--                        <th>{{$coupon->quantity}} </th>--}}
{{--                        <th>--}}
{{--                            <a href="{{route('coupons.edit',$coupon->id)}}" title="Cập nhật" class="btn btn-circle btn-outline-warning"><i class="fa fa-edit"></i></a>--}}
{{--                            <button class="btn btn-circle btn-outline-danger delete-coupon" title="Xóa" delete="{{$coupon->id}}"><i class="fa fa-trash"></i></button>--}}
{{--                        </th>--}}
{{--                    </tr>--}}
{{--                @endforeach--}}
                </tbody>
            </table>

        </div>
        <div>

        </div>
    </div>
@endsection
