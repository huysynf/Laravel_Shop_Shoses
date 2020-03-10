@extends('clients.layouts.app')
@section('title',__('content.search'))
@section('content')
    <div class="sec-banner bg0 p-t-80 p-b-50">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                    <!-- Block1 -->
                    <div class="block1 wrap-pic-w">
                        <img src="{{asset('client/images/banner-01.jpg')}}" alt="IMG-BANNER">

                        <a href="{{route('categories.product','giay-nu')}}"
                           class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                            <div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									  @lang('content.women')
								</span>

                                <span class="block1-info stext-102 trans-04">
								  @lang('content.fashion')
								</span>
                            </div>

                            <div class="block1-txt-child2 p-b-4 trans-05">
                                <div class="block1-link stext-101 cl0 trans-09">
                                    @lang('content.buy-now')
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                    <!-- Block1 -->
                    <div class="block1 wrap-pic-w">
                        <img src="{{asset('client/images/banner-02.jpg')}}" alt="IMG-BANNER">

                        <a href="{{route('categories.product','giay-nam')}}"
                           class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                            <div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									  @lang('content.men')
								</span>

                                <span class="block1-info stext-102 trans-04">
                                      @lang('content.fashion')
								</span>
                            </div>

                            <div class="block1-txt-child2 p-b-4 trans-05">
                                <div class="block1-link stext-101 cl0 trans-09">
                                    @lang('content.buy-now')
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product -->
    @if($products->total()>0)
        <section class="bg0 p-t-23 p-b-140">
            <div class="container">
                <div class="p-b-10">
                    <h3 class="ltext-103 cl5">
                        {{$products->total()}}  @lang('content.product') @lang('content.search') @lang('content.success')
                    </h3>
                </div>
                <div class="row isotope-grid">
                    @foreach($products as $product)
                        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                            <!-- Block2 -->
                            <div class="block2 position-relative">
                                @if($product->sale>0)
                                    <div class="position-absolute" style="     width: 45px;
                                                                                height: 45px;
                                                                                border: 1px solid red;
                                                                                border-radius: 50%;
                                                                                z-index: 5;
                                                                                text-align: center;
                                                                                padding: 3% 2%; color: red">
                                        -{{$product->sale}}%
                                    </div>
                                @endif
                                <div class="block2-pic hov-img0">
                                    <img src="{{asset('images/products/'.$product->image)}}" alt="{{$product->name}}">
                                    <a href="{{route('product.detail',$product->slug)}}"
                                       class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04  ">
                                        @lang('content.detail')
                                    </a>
                                </div>

                                <div class="block2-txt flex-w flex-t p-t-14">
                                    <div class="block2-txt-child1 flex-col-l ">
                                        <a href="{{route('product.detail',$product->slug)}}"
                                           class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                            {{$product->name}}
                                        </a>
                                        <span class="stext-105 cl3">
									        @if($product->sizes->count()>0)
                                                @if( $product->sale >0)
                                                    <span
                                                        style="text-decoration:line-through">{{$product->sizes->first()->price}}</span>
                                                    <span>{{$product->sizes->first()->price - ($product->sizes->first()->price *($product->sale/100)) }} VND</span>
                                                @else
                                                    {{number_format($product->sizes->first()->price)}} VND
                                                @endif

                                            @endif
								</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Load more -->
                <div class="flex-c-m flex-w w-full p-t-45">
                    {{$products}}
                </div>
            </div>
        </section>
    @else
        <div class="row justify-content-center p-4">
            <h4>@lang('message.no-product')</h4>
        </div>
    @endif

@endsection

