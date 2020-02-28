@extends('admins.layouts.app')

@section('title',' Quản lý đơn hàng')

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
                    <input value="{{request()->input('user_name')}}" class="h-50" type="text" placeholder="Tên khách hàng"
                           name="user_name">
                </div>
                <div class="d-flex flex-column ml-1">
                    <lable class="text-primary" for="sale">Địa chỉ </lable>
                    <input value="{{request()->input('user_address')}}" class="h-50" type="text"
                           placeholder="Địa chỉ " name="user_address">
                </div>
                <div class="d-flex flex-column ml-1">
                    <lable class="text-primary" for="sale">Số điện thoại </lable>
                    <input value="{{request()->input('user_phone')}}" class="h-50" type="text"
                           placeholder=" Số điện thoại  " name="user_phone">
                </div>
                <div class="d-flex flex-column ml-1">
                    <lable class="text-primary" for="sale">Trạng thái</lable>
                    <input value="{{request()->input('status')}}" class="h-50" type="text"
                           placeholder="Trạng thái" name="status">
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
            <p class="p-2">Tổng cộng:{{$orders->total()}}</p>
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
                    <th>Tên khách hàng</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Tên Hàng</th>
                    <th>Tổng tiền</th>
                    <th>Ship</th>
                    <th>Trạng thái</th>
                    <th>Thanh toán</th>
                    <th>Tùy chọn</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td><strong></strong></td>
                        <td>{{$order->user_name}}</td>
                        <td>{{$order->user_address}}</td>
                        <td>{{$order->user_phone}}</td>
                        <td>
                            @foreach($order->products as $product)
                                <p>Sản phẩm:{{$product->name}}, Số lượng :{{$product->pivot->quantity}}, Cỡ : {{$product->pivot->size}} , Màu:{{$product->pivot->color }}</p>
                            @endforeach
                        </td>
                        <td>{{number_format($order->total)}} VND</td>
                        <td>{{$order->ship =='free' ? $order->ship  :number_format($order->ship ).'VND'}}</td>
                        <td order="{{$order->id}}">{{$order->status}} </td>
                        <td>{{$order->payment}} </td>
                        <td>
                            <button class="btn btn-outline-warning edit-order" title="Cập nhật" data-toggle="modal"
                                    data-target="#editOrderModal" order="{{$order->id}}"
                            ><i class="fa fa-edit"></i></button>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

        </div>
        <div>
            {{$orders}}
        </div>
    </div>
    @include('admins.products.modal')


    <div class="modal fade" id="editOrderModal" tabindex="-1" role="dialog" aria-labelledby="editOrderModalTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editOrderModalTitle">Cập nhật thông tin đơn hàng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="update-order-form">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Trạng thái </label>
                            <select name="status" class="form-control select-status-order">
                                <option value="Đã nhận được đơn hàng">Đã nhận được đơn hàng</option>
                                <option value="Đang vận chuyển">Đang vận chuyển</option>
                                <option value="Giao hàng thành công">Giao hàng thành công</option>
                                <option value="Đơn hàng bị hủy">Đơn hàng bị hủy</option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <button type="button" class="btn btn-primary update-order-status">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('js/order.js')}}"></script>
@endsection
