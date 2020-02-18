@extends('clients.layouts.app')
@section('tittle','Đặt hàng ')
@section('content')
    <div class="sec-banner bg0 p-t-80 p-b-50">

    </div>
    @if(session('message'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong> {{session('message')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="{{route('home')}}" class="stext-109 cl8 hov-cl1 trans-04">
                Trang chủ
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>
            <span class="stext-109 cl4">
				Đơn  hàng
			</span>
        </div>
    </div>
    <div class="container mb-4 mt-4">
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <tr>
                        <th>STT</th>
                        <th>Danh sách sản phẩm</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Ship</th>
                        <th>Thanh toán</th>
                    </tr>
                    @foreach($orders as $order)
                        <tr>
                            <td><strong></strong></td>
                            <td>
                                @foreach($order->products as $product)
                                    <p>Sản phẩm:{{$product->name}}, Số lượng :{{$product->pivot->quantity}}, Cỡ
                                        : {{$product->pivot->size}} , Màu:{{$product->pivot->color }}</p>
                                @endforeach
                            </td>
                            <td>{{number_format($order->total)}} VND</td>
                            <td>{{$order->status}}</td>
                            <td>{{$order->ship =='free' ? $order->ship  :number_format($order->ship ).'VND'}}</td>
                            <td>{{$order->payment}}</td>
                            <td>
                                <button class="btn btn-outline-warning btn-circle delete-order" order="{{$order->id}}" {{ $order->status !='Đã nhận được đơn hàng' ?'disabled':'' }} title="Hủy đơn hàng "><i class="fa fa-trash text-danger"> </i></button></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('js/order.js')}}"></script>
    @endsection
