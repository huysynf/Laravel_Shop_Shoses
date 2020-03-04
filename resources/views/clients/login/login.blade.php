@extends('clients.layouts.app')
@section('title',__('content.login'))
@section('content')
    <div class="sec-banner bg0 p-t-80 p-b-50">

    </div>

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
    @if(session('message1'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong> {{session('message1')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if(session('message'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong> {{session('message')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">@lang('content.login')</h1>
                                    </div>
                                    <form class="user" method="post" action="{{route('login.postlogin')}}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                  name="email" aria-describedby="emailHelp"
                                                   value="{{old('email')}}"
                                                   placeholder="Enter *..." @error('email')autofocus @enderror >
                                            @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                  name="password" placeholder="Password " @error('password')autofocus @enderror     value="{{old('password')}}" >
                                            @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <button  class="btn btn-primary btn-user btn-block">
                                            @lang('content.login')
                                        </button>
                                        <hr>
                                        <a href="{{route('login.google')}}" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> @lang('content.login')  @lang('content.with') Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> @lang('content.login')  @lang('content.with') Facebook
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="{{route('login.getregister')}}">@lang('content.register')!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


@endsection
