<header>
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <!-- Topbar -->
        <div class="top-bar">
            <div class="content-topbar flex-sb-m h-full container">
                <div class="left-top-bar">
                    Free ship @lang('message.with-order') 500k
                </div>
                <div class="right-top-bar flex-w h-full">

                    @if(Auth::guard()->check())
                        <a class="flex-c-m trans-04 p-lr-25" href="" onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();"> <i
                                class="text-danger fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>  @lang('content.logout')</a>
                        <form id="logout-form" action="{{ route('login.logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>

                        <a href="{{route('home.account')}}" class="flex-c-m trans-04 p-lr-25">
                          @lang('content.account')
                        </a>
                    @else
                        <a href="{{route('login.login')}}" class="flex-c-m trans-04 p-lr-25">
                            @lang('content.login')
                        </a>
                    @endif

                    <a href="{{route('lang.client','en')}}" class="flex-c-m trans-04 p-lr-25  {{config('app.locale') == 'en' ? 'bg-info text-dark':''}}  " title="English" disabled>
                        EN
                    </a>

                    <a href="{{route('lang.client','vi')}}" class="flex-c-m trans-04 p-lr-25 {{config('app.locale') == 'vi' ? 'bg-info text-dark':''}}" title="Tiếng việt">
                        VN
                    </a>

                </div>
            </div>
        </div>

        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop container">

                <!-- Logo desktop -->
                <a href="{{route('home')}}" class="logo">
                    <img src="{{asset('client/images/icons/logo-01.png')}}" alt="IMG-LOGO">
                </a>
                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li class="active-menu">
                            <a href="{{route('home')}}">@lang('content.home')</a>
                        </li>
                        @foreach($categories as $category)
                            @if ($category->parent_id==null)
                                <li>
                                    <a href="{{route('categories.product',$category->slug)}}">{{$category->name}}</a>
                                    @if ($category->childrenCategories->count()>0)
                                        <ul class="sub-menu">
                                            @foreach($category->childrenCategories as $sub)
                                                <li>
                                                    <a href="{{route('categories.product',$sub->slug)}}">{{$sub->name}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endif

                        @endforeach
                        <li>
                            <a href="{{route('home.contact')}}">Liên hệ</a>
                        </li>
                    </ul>
                </div>

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                        <i class="zmdi zmdi-search"></i>
                    </div>

                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart"
                         data-notify="{{$carts->count()}}">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>
                    @auth
                        <a class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10  " title="Thanh toán" href="{{route('cart.checkout')}}"
                        >
                            <i class="fa fa-money-bill text-primary"></i>
                        </a>
                        <a class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10  " title="Đơn hàng" href="{{route('user.order.index')}}"
                           >
                            <i class="fa fa-shopping-bag text-info  "></i>
                        </a>
                    @endauth
                </div>
            </nav>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->
        <div class="logo-mobile">
            <a href="index.html"><img src="{{asset('client/images/icons/logo-01.png')}}" alt="IMG-LOGO"></a>
        </div>

        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m m-r-15">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                <i class="zmdi zmdi-search"></i>
            </div>

            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart"
                 data-notify="{{$carts->count()}}">
                <i class="zmdi zmdi-shopping-cart"></i>

            </div>


            <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti"
               data-notify="0">
                <i class="zmdi zmdi-favorite-outline"></i>
            </a>
        </div>

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
        </div>
    </div>


    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="topbar-mobile">
            <li>
                <div class="left-top-bar">
                    Free ship @lang('message.with-order') 500k
                </div>
            </li>

            <li>
                <div class="right-top-bar flex-w h-full">
                    @if(Auth::guard()->check())
                        <a class="flex-c-m trans-04 p-lr-10" href="" onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();"> <i
                                class="text-danger fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>  @lang('content.logout')</a>
                        <form id="logout-form" action="{{ route('login.logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>

                        <a href="{{route('home.account')}}" class="flex-c-m trans-04 p-lr-10">
                            @lang('content.account')
                        </a>
                    @else
                        <a href="{{route('login.login')}}" class="flex-c-m trans-04 p-lr-10">
                            @lang('content.login')
                        </a>
                    @endif


                    <a href="{{route('lang.client','en')}}" class="flex-c-m p-lr-10 trans-04       ">
                        EN
                    </a>

                    <a href="{{route('lang.client','vi')}}" class="flex-c-m p-lr-10 trans-04  ">
                        VN
                    </a>
                </div>
            </li>
        </ul>

        <ul class="main-menu-m">
            <li class="active-menu">
                <a href="{{route('home')}}"> @lang('content.home')</a>
            </li>
            @foreach($categories as $category)
                @if ($category->parent_id==null)
                    <li>
                        <a href="{{route('categories.product',$category->slug)}}">{{$category->name}}</a>
                        @if ($category->childrenCategories->count()>0)
                            <ul class="sub-menu">
                                @foreach($category->childrenCategories as $sub)
                                    <li><a href="{{route('categories.product',$sub->slug)}}">{{$sub->name}}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endif

            @endforeach
            <li>
                <a href="{{route('home.contact')}}">Liên hệ</a>
            </li>
            @auth
                <a class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10  " title="Thanh toán" href="{{route('cart.checkout')}}"
                >
                    <i class="fa fa-money-bill text-primary"></i>
                </a>
                <a class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10  " title="Đơn hàng" href="{{route('user.order.index')}}"
                >
                    <i class="fa fa-shopping-bag text-info  "></i>
                </a>
            @endauth
        </ul>
    </div>

    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <div class="container-search-header">
            <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                <img src="{{asset('client/images/icons/icon-close2.png')}}" alt="CLOSE">
            </button>
            <form class="wrap-search-header flex-w p-l-15" action="{{route('search.name')}}" method="get">
                <button class="flex-c-m trans-04">
                    <i class="zmdi zmdi-search"></i>
                </button>
                <input class="plh3" type="text" name="search" placeholder="Search...">
            </form>
        </div>
    </div>
</header>

