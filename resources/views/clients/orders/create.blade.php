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
				Đặt hàng
			</span>
        </div>
    </div>
    <!-- Shoping Cart -->

    <div class="container mt-3 mb-3">
        <div class="row">
            <h4>Danh Sách hàng</h4>
            <table class="table table-hover">
                <tr>
                    <td>STT</td>
                    <td>Tên Giày</td>
                    <td>Số lượng</td>
                </tr>
                <tbody>
                @foreach($cartOrders as $key=>$cart)
                    <tr>
                        <td><strong></strong></td>
                        <td>{{$cart->name}} </td>
                        <td>{{$cart->quantity}}</td>
                    </tr>
                @endforeach
                <tr>
                    <td rowspan="3">
                        Tổng cộng:
                        @if($discount_price>1)
                            <span style="text-decoration:line-through"> {{number_format($total)}}</span>
                            <span>{{number_format($total-$discount_price)}}</span>
                        @else
                            {{number_format($total)}}
                        @endif fVND

                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-12">
                <h4 class="pl-3">Thông tin thanh toán </h4>
            </div>
            <div class="col-12">
                <form action="{{route('user.order.store')}}" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{Auth::guard()->id()}}">
                    <div class="row form-group">
                        <div class="col-6 ">
                            <label for="">Tên người nhận </label>
                            <input type="text" name="user_name" class="form-control" value="{{Auth::guard()->user()->name}}">
                        </div>
                        <div class="col-6">
                            <label for="">Số điện thoại </label>
                            <input type="text" name="user_phone" class="form-control" value="{{Auth::guard()->user()->phone}}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-6">
                            <label for="">Email </label>
                            <input type="text" name="user_email" class="form-control" value="{{Auth::guard()->user()->email}}">
                        </div>
                        <div class="col-6">
                            <label for="">Địa chỉ </label>
                            <input type="text" name="user_address" class="form-control" value="{{Auth::guard()->user()->address}}">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-6">
                            <label for="">Phương thức thanh toán  </label>
                            <div class="d-flex">
                                <input type="radio" name="payment" value="cod" checked
                                >
                                <p> Thanh toán khi nhận hàng</p>
                            </div>
                            <div class="d-flex">
                                <input type="radio" name="payment" value="" disabled>
                                <p>Đang update ...</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="">Chi phí ship </label>
                            <div class="d-flex">
                                <input type="radio" name="ship" value="free"  {{$total<5000000 ? 'disabled':'checked'}}>
                                <p> Miễn phí giao hàng</p>
                            </div>
                            <div class="d-flex">
                                <input type="radio" name="ship" value="30000" {{$total>5000000 ? 'disabled':'checked'}}>
                                <p> {{number_format('30000')}} VND</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-lock"></i> Đặt hàng</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
