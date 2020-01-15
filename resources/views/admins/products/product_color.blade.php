@extends('admins.layouts.app')

@section('title',' Thêm màu cho sản phẩm')

@section('content')
    <div class="d-flex  mb-4">
        <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
        <a title="Quay lại trang quản lý" class="btn btn-outline-primary btn-circle ml-2"
           href="{{route('products.index')}}">
            <i class="fa fa-undo"></i>
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
    @if(count($sizes)>0)

        @foreach($sizes as $size)
            <div class="col-6 col-lg-6 col-md-6 " style="border: 1px solid #3300aa">
                <div class="d-flex">
                    <h4>Kích cỡ :{{$size->size}}</h4>
                    <button title="Thêm mới màu" class="btn btn-outline-primary btn-circle ml-2 add-product-color"
                            style="width: 30px;height: 30px;" data-toggle="modal" data-target="#addProductColor"
                            name="{{$size->size}}"
                            size="{{$size->id}}"
                    ><i class="fa fa-plus"></i>
                    </button>
                </div>
                <table class="table table-bordered">
                    <tr>
                        <th>Màu</th>
                        <th>Số lượng</th>
                        <th>Tùy chọn</th>
                    </tr>
                    <tbody class="tbody-product-color" size="{{$size->size}}">
                    @foreach($size->colors as $color)
                        <tr>
                            <td class="m-0 p-0">
                                <div class="box-color" style="background:{{$color->color}}">
                                </div>
                            </td>
                            <td class="m-0 p-0"> {{$color->quantity==0?'Hết hàng':$color->quantity}}</td>
                            <td class="m-0 p-0">
                                <button class="btn btn-circle btn-outline-warning" color="{{$color->id}}" title="Cập nhật "><i class="fa fa-pen"></i></button>
                                <button class="btn btn-circle btn-outline-danger" delete="{{$color->id}}" title="Xóa"><i class="fa fa-times"></i></button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach

        <div class="modal fade" id="addProductColor" tabindex="-1" role="dialog" aria-labelledby="addProductColorTitle"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addProductColorTitle" class="title-add-product-size"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="error-box text-danger"></div>

                        <form action="{{route('products.color.store')}}" method="post" class="new-product-color-form">
                            @csrf
                            <input type="hidden" name="product_size_id" class="product-size-id">

                            <div class=" form-group">
                                <label for="">Chọn màu</label>
                                <input type="color" name="color">
                            </div>
                            <div class="form-group">
                                <label for="">Số lượng </label>
                                <input type="text" class="color-quantity" name="quantity" value="{{old('quantity')}}"
                                >
                            </div>
                        </form>
                        <div class="form-group">
                            <button type="button" class="btn btn-outline-danger btn-circle" data-dismiss="modal"><i
                                    class="fa fa-times"></i></button>
                            <button type="button" class="btn btn-outline-primary btn-circle new-product-color"><i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @else
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong> Bạn chưa có kích cỡ nào </strong>
            <p>Quay lại trang quản lí để thêm kích cỡ tại <a href="{{route('products.index')}}"
                                                             class="text-danger">Đây </a></p>
        </div>
    @endif

@endsection

