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
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status"
                           value="" {{(request()->input('status')=="")?'checked='.'checked':''}}>
                    <label class="form-check-label" for="inlineRadio2">Tất cả </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status"
                           value="1" {{(request()->input('status')==1)?'checked='.'checked':''}}>
                    <label class="form-check-label" for="inlineRadio1">Hiện thị</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status"
                           value="2" {{(request()->input('status')==2)?'checked='.'checked':''}}>
                    <label class="form-check-label" for="inlineRadio2">Không hiện thị</label>
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
            <p class="p-2 text-primary">Tổng cộng:{{$slides->total()}}</p>
            <p class="p-2 text-info">Hiện thị :{{$slideShow}} Slide ảnh </p>
            <p class="p-2 text-danger">Không hiện thị :{{$slideNotShow}} Slide ảnh</p>
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
                            <button class="btn btn-circle btn-outline-danger delete-slide" title="Xóa"
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
