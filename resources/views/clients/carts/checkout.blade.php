@extends('clients.layouts.app')
@section('title',__('content.checkout'))
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
                @lang('content.home')
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>
            <span class="stext-109 cl4">
				@yield('title')
			</span>
        </div>
    </div>
    <!-- Shoping Cart -->
    <section class="bg0 p-t-75 p-b-85">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                    <div class="m-l-25 m-r--38 m-lr-0-xl">
                        <div class="wrap-table-shopping-cart">
                            <table class="table-shopping-cart">
                                <tr class="table_head">
                                    <th class="column-1">@lang('content.product')</th>
                                    <th class="column-2"></th>
                                    <th class="column-3">@lang('content.price')</th>
                                    <th class="column-3">@lang('content.quantity')</th>
                                    <th class="column-3">@lang('content.size')</th>
                                    <th class="column-3">@lang('content.color')</th>
                                    <th class="column-3">@lang('content.total')</th>
                                </tr>

                                @if($cartOrders->products->count() >0)
                                    @foreach($cartOrders->products as $item)
                                        <tr class="table_row ">
                                            <td class="column-1 position-relative">
                                                @if($item->sale>0)
                                                    <div class="position-absolute" style="     width: 20px;
                                                                                height: 20px;
                                                                               top:20%;
                                                                               right: 50%;
                                                                                z-index: 5;
                                                                                text-align: center;
                                                                                padding: 3% 2%; color: red">
                                                        -{{$item->sale}}%
                                                    </div>
                                                @endif

                                                <span class="position-absolute delete-cart-item"
                                                      style="top: 30%;font-size: 20px; cursor: pointer;right: 65%"
                                                      cart="{{$item->pivot->id}}" title="Xóa hàng này"> <i
                                                        class="fa fa-times text-danger"></i></span>
                                                <div class="how-itemcart1">
                                                    <img
                                                        src="{{asset('/images/products/'.($item->image??'default.jpg'))}}"
                                                        alt="IMG">
                                                </div>
                                            </td>
                                            <td class="column-2">{{$item->name}}</td>
                                            <td class="column-3">
                                                @if($item->sale>0)
                                                    <span style="text-decoration:line-through">{{$item->size->first()->price}}</span>

                                                    {{number_format($item->sizes->first()->price -($$item->sizes->first()->price*($item->sale/100)))}}
                                                    VND
                                                @else
                                                    {{number_format($item->sizes->first()->price)}} VND
                                                @endif

                                            </td>
                                            <td class="column-3">
                                                <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                                    <div
                                                        class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m quantity-update"
                                                        cart="{{$item->pivot->id}}">
                                                        <i class="fs-16 zmdi zmdi-minus"></i>
                                                    </div>
                                                    <input class="mtext-104 cl3 txt-center num-product quantity-cart"
                                                           type="number" name="num-product1" value="{{$item->pivot->quantity}}">

                                                    <div
                                                        class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m quantity-update"
                                                        cart="{{$item->pivot->id}}">
                                                        <i class="fs-16 zmdi zmdi-plus"></i>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="column-3">{{$item->pivot->size}}</td>
                                            <td class="column-3">{{$item->pivot->color}}</td>
                                            <td class="column-3">
                                                @if($item->sale>0)
                                                    <span style="text-decoration:line-through">{{$item->price}}</span>
                                                    <span>{{number_format(($item->sizes->first()->price*$item->sale)/100)}}</span>
                                                @else
                                                    {{number_format(($item->sizes->first()->price-($item->sizes->first()->price*($item->sale/100)))*$item->pivot->quantity)}}
                                                    VND
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <p>Không có sản phẩm trong giỏ hàng</p>
                                @endif
                            </table>
                        </div>
{{--                        {{var_dump(session('message'))}}--}}
                        <form action="{{route('cart.coupon')}}" method="post">
                            <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                                @csrf
                                <input type="hidden" name="Total_amountPrice" value="{{$total}}">
                                <div class="flex-w flex-m m-r-20 m-tb-5">
                                    <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text"
                                           name="coupon_code" placeholder="Mã giảm giá..."
                                           style="text-transform: uppercase;" value="{{old('coupon_code')}}"
                                           @error('coupon_code')autofocus @enderror/>
                                    @error('coupon_code')
                                        <span>{{ $message }}</span>
                                    @enderror
                                    <button
                                        class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5"
                                        type="submit">
                                      @lang('content.coupon')
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                    <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                        <h4 class="mtext-109 cl2 p-b-30">
                            @lang('content.information')
                        </h4>

                        <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                            <div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Shipping:
								</span>
                            </div>

                            <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                                <p class="stext-111 cl6 p-t-2">
                                    Free ship @lang('message.with-order') 500k
                                </p>

                            </div>
                        </div>
                        @if($cartOrders->count()>0)
                            <div class="flex-w flex-t bor12 p-b-13">
                                <div class="size-208">
								<span class="stext-110 cl2">
									@lang('content.total')::
								</span>
                                </div>

                                <div class="size-209">
								<span class="mtext-110 cl2">
									{{number_format($total)}} VND
								</span>
                                </div>
                            </div>
                            @if(Session::has('discount_amount_price'))
                                <div class="flex-w flex-t p-t-27 p-b-33">
                                    <div class="size-208">
								<span class="mtext-101 cl2">
								@lang('content.coupon'): (code: {{Session::get('coupon_code')}}):
								</span>
                                    </div>

                                    <div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									{{number_format(Session::get('discount_amount_price'))}}VND
								</span>
                                    </div>
                                </div>
                                <div class="flex-w flex-t p-t-27 p-b-33">
                                    <div class="size-208">
								<span class="mtext-101 cl2">
									@lang('content.total'):
								</span>
                                    </div>

                                    <div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									{{number_format($total-(Session::get('discount_amount_price')))}} VND
								</span>
                                    </div>
                                </div>
                            @endif
                            <a class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" href="{{route('cart.order')}}">
                                @lang('content.next'):
                            </a>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
