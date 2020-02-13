@extends('clients.layouts.app')
@section('tittle','Thanh toán  ')
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
				Đơn hàng
			</span>
        </div>
    </div>
<?php $stt=0; ?>
    <div class="container mb-4 mt-4">
        <div class="row">
            <div>
                <h4>Danh sách các đơn hàng</h4>
            </div>
            <div class="col-12">
                <table class="table table-hover">
                    <tr>
                        <th>STT</th>
                        <th>Danh sách tên hàng</th>
                        <th>Trạng thái </th>
                        <th> Tổng tiền </th>
                    </tr>

                    @foreach($orders as $order)
                        <tr>
                            <td>{{$stt+=1}}</td>
                            <td>
                               @foreach($order->products as $product)
                                <p>{{ $product->name }}  X {{$product->pivot->quantity}} X {{$product->pivot->size}}  X {{$product->pivot->color}}</p>
                                @endforeach
                            </td>
                            <td>{{$order->status}} </td>
                            <td> {{number_format($order->total)}}  VND</td>
                        </tr>
                  @endforeach
                </table>
                <div>
                    {{$orders}}
                </div>
            </div>
        </div>
    </div>
    @endsection


