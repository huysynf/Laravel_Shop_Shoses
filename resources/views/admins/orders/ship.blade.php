
@extends('admins.layouts.app')

@section('title',' Quản lý đơn hàng')


@section('content')



    <P>su kien</P>

    <form action="{{route('order.ship',3)}}" method="post">
        @csrf
        <button type="submit">Gui</button>
    </form>
@endsection
