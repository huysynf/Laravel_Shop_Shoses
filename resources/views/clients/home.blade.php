@extends('clients.layouts.app')
@section('tittle','Trang chủ')
@section('content')
    @include('clients.includes.slide')
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
    <section class="bg0 p-t-23 p-b-140">
        <div class="container">
            <div class="p-b-10">
                <h3 class="ltext-103 cl5">
                    @lang('content.product')
                </h3>
            </div>

            <div class="flex-w flex-sb-m p-b-52">
                <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter=".new">
                        @lang('content.new-product')
                    </button>

                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".women">
                        @lang('content.women')
                    </button>

                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".men">
                        @lang('content.men')
                    </button>

                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".sale">
                        @lang('content.sale')
                    </button>

                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".update">
                        update
                    </button>


                </div>

                <div class="flex-w flex-c-m m-tb-10">
                    <div
                        class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
                        <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
                        <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                        @lang('content.filter')
                    </div>

                    <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                        <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
                        <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                        @lang('content.search')
                    </div>
                </div>

                <!-- Search product -->
                <div class="dis-none panel-search w-full p-t-10 p-b-15">
                    <div class="bor8 dis-flex p-l-15">
                        <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                            <i class="zmdi zmdi-search"></i>
                        </button>

                        <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product"
                               placeholder="Search">
                    </div>
                </div>

                <!-- Filter -->
                <div class="dis-none panel-filter w-full p-t-10">
                    <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
                        <div class="filter-col1 p-r-15 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                Sort By
                            </div>

                            <ul>
                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        Default
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        Popularity
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        Average rating
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04 filter-link-active">
                                        Newness
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        Price: Low to High
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        Price: High to Low
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="filter-col2 p-r-15 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                Price
                            </div>

                            <ul>
                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04 filter-link-active">
                                        All
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        $0.00 - $50.00
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        $50.00 - $100.00
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        $100.00 - $150.00
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        $150.00 - $200.00
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        $200.00+
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="filter-col3 p-r-15 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                Color
                            </div>

                            <ul>
                                <li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #222;">
										<i class="zmdi zmdi-circle"></i>
									</span>

                                    <a href="#" class="filter-link stext-106 trans-04">
                                        Black
                                    </a>
                                </li>

                                <li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #4272d7;">
										<i class="zmdi zmdi-circle"></i>
									</span>

                                    <a href="#" class="filter-link stext-106 trans-04 filter-link-active">
                                        Blue
                                    </a>
                                </li>

                                <li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #b3b3b3;">
										<i class="zmdi zmdi-circle"></i>
									</span>

                                    <a href="#" class="filter-link stext-106 trans-04">
                                        Grey
                                    </a>
                                </li>

                                <li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #00ad5f;">
										<i class="zmdi zmdi-circle"></i>
									</span>

                                    <a href="#" class="filter-link stext-106 trans-04">
                                        Green
                                    </a>
                                </li>

                                <li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #fa4251;">
										<i class="zmdi zmdi-circle"></i>
									</span>

                                    <a href="#" class="filter-link stext-106 trans-04">
                                        Red
                                    </a>
                                </li>

                                <li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #aaa;">
										<i class="zmdi zmdi-circle-o"></i>
									</span>

                                    <a href="#" class="filter-link stext-106 trans-04">
                                        White
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="filter-col4 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                Tags
                            </div>

                            <div class="flex-w p-t-4 m-r--5">
                                <a href="#"
                                   class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                    Fashion
                                </a>

                                <a href="#"
                                   class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                    Lifestyle
                                </a>

                                <a href="#"
                                   class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                    Denim
                                </a>

                                <a href="#"
                                   class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                    Streetstyle
                                </a>

                                <a href="#"
                                   class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                    Crafts
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row isotope-grid">
                @foreach($newProducts as $product)
                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item new">
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
                                <img src="{{asset('images/products/'.$product->image)}}" alt="IMG-PRODUCT">

                                <a href="{{route('product.detail',$product->slug)}}"
                                   class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                                    @lang('content.detail')
                                </a>
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="product-detail.html"
                                       class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        {{$product->name}}
                                    </a>

                                    <span class="stext-105 cl3">
                                        @if($product->sizes->count()>0)
                                            @if( $product->sale >0)
                                                <span style="text-decoration:line-through">{{$product->sizes->first()->price}}</span>
                                                <span >{{$product->sizes->first()->price - ($product->sizes->first()->price *($product->sale/100)) }} VND</span>
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

                @foreach($girlProducts as $product)
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
                                <img src="{{asset('images/products/'.$product->image)}}" alt="IMG-PRODUCT">

                                <a href="{{route('product.detail',$product->slug)}}"
                                   class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 ">
                                    @lang('content.detail')
                                </a>
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="product-detail.html"
                                       class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        {{$product->name}}
                                    </a>

                                    <span class="stext-105 cl3">
                                        @if($product->sizes->count()>0)
                                            @if( $product->sale >0)
                                                <span style="text-decoration:line-through">{{$product->sizes->first()->price}}</span>
                                                <span >{{$product->sizes->first()->price - ($product->sizes->first()->price *($product->sale/100)) }} VND</span>
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
                    @foreach($menProducts as $product)
                        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item men">
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
                                    <img src="{{asset('images/products/'.$product->image)}}" alt="IMG-PRODUCT">

                                    <a href="{{route('product.detail',$product->slug)}}"
                                       class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                                        @lang('content.detail')
                                    </a>
                                </div>

                                <div class="block2-txt flex-w flex-t p-t-14">
                                    <div class="block2-txt-child1 flex-col-l ">
                                        <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                            {{$product->name}}
                                        </a>

                                        <span class="stext-105 cl3">
                                        @if($product->sizes->count()>0)
                                                @if( $product->sale >0)
                                                    <span style="text-decoration:line-through">{{$product->sizes->first()->price}}</span>
                                                    <span >{{$product->sizes->first()->price - ($product->sizes->first()->price *($product->sale/100)) }} VND</span>
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
                    @foreach($saleProducts as $product)
                        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item sale">
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
                                    <img src="{{asset('images/products/'.$product->image)}}" alt="IMG-PRODUCT">

                                    <a href="{{route('product.detail',$product->slug)}}"
                                       class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                                        @lang('content.detail')
                                    </a>
                                </div>

                                <div class="block2-txt flex-w flex-t p-t-14">
                                    <div class="block2-txt-child1 flex-col-l ">
                                        <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                            {{$product->name}}
                                        </a>

                                        <span class="stext-105 cl3">
                                        @if($product->sizes->count()>0)
                                                @if( $product->sale >0)
                                                    <span style="text-decoration:line-through">{{$product->sizes->first()->price}}</span>
                                                    <span >{{$product->sizes->first()->price - ($product->sizes->first()->price *($product->sale/100)) }} VND</span>
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

                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item update">
                        <!-- Block2 -->
                        <div class="block2">
                        <p></p>
                        </div>
                    </div>
            </div>

            <!-- Load more -->
            <div class="flex-c-m flex-w w-full p-t-45">
                <a href="{{route('home')}}" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                    @lang('content.more')
                </a>
            </div>
        </div>
    </section>

@endsection
