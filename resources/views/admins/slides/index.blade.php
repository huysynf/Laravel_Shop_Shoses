@extends('admins.layouts.app')

@section('title',' Quản lý slider')

@section('content')
    <div class="d-flex  mb-4">
        <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
        <a title="Thêm mới mã giảm giá"
           href="{{route('slides.create')}}"
           class="btn btn-outline-primary btn-circle ml-2 add-brand">
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

        <div class="text-dark d-flex">
            <p class="p-2">Tổng cộng:{{$slides->total()}}</p>
            <p class="p-2">Hiện thị :{{$slideShow}}</p>
            <p class="p-2">Không hiện thị :{{$slideNotShow}}</p>
        </div>
    </div>
    <div class="row" id="coupon">
        <div class="col-12">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Ảnh</th>
                    <th>Trạng thái</th>
                    <th>Mô tả</th>
                    <th>Tùy chọn</th>
                </tr>
                </thead>
                <tbody>
                @foreach($slides as $slide)
                    <tr>
                        <td><strong></strong></td>
                        <td><img src="{{asset('/images/slides/'.$slide->image)}}"
                                 style="max-width: 50px;max-height: 50px;" width="100%" height="100%"
                                 alt="{{$slide->name}}">
                        </td>
                        <td>{{$slide->status===1?'Hiện thị':'Không hiện thị '}} </td>
                        <td style="text-overflow: ellipsis;">{!! $slide->description !!} </td>
                        <td>
                            <a href="{{route('slides.edit',$slide->id)}}" title="Cập nhật"
                               class="btn btn-circle btn-outline-warning"><i class="fa fa-edit"></i></a>
                            <button class="btn btn-circle btn-outline-danger delete-coupon" title="Xóa"
                                    delete="{{$slide->id}}"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
        <div>

        </div>
    </div>
@endsection
