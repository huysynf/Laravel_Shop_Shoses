@extends('admins.layouts.app')

@section('title',' Quản lý đơn hàng')


@section('content')

    @if(session('message'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong> {{session('message')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


    <P>su kien</P>

    <form action="{{route('order.ship',3)}}" method="post">
        @csrf
        <tr>
            <td><strong></strong></td>
            <td>{{$order->user_name}}</td>
            <td>{{$order->user_address}}</td>
            <td>{{$order->user_phone}}</td>
            <td>
                @foreach($order->products as $product)
                    <p>Sản phẩm:{{$product->name}}, Số lượng :{{$product->pivot->quantity}}, Cỡ
                        : {{$product->pivot->size}} , Màu:{{$product->pivot->color }}</p>
                @endforeach
            </td>
            <td>{{number_format($order->total)}} VND</td>
            <td>{{$order->ship =='free' ? $order->ship  :number_format($order->ship ).'VND'}}</td>
            <td order="{{$order->id}}">{{$order->status}} </td>
            <td>{{$order->payment}} </td>
        </tr>
        <button type="submit">Gui</button>
    </form>
@endsection
