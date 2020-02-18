
@extends('clients.layouts.app')
@section('tittle','Thông tin tài khoản')
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
				Thông tin tài khoàn
			</span>
        </div>
    </div>
    <!-- Product Detail -->
    <section class="sec-product-detail bg0 p-t-65 p-b-60">
        <div class="container">
            <form action="{{route('home.account.update',Auth::guard()->id())}}" method="post"  enctype="multipart/form-data">
                @csrf
                @method('put')
                <button type="submit" class="btn btn-outline-primary mb-1"><i class="fa fa-edit"></i>Cập nhật </button>
                <div class="row">
                    <div class="form-group col-md-6 col-lg-6 col-sm-12">
                        <label for="">Tên </label>
                        <input type="text" class="form-control" name="name" value="{{old('name')??Auth::guard()->user()->name}}"
                               @error('name')autofocus @enderror>
                    </div>
                    <div class="form-group col-md-6 col-lg-6 col-sm-12">
                        <label for="">Email </label>
                        <input type="text" class="form-control " name="email" value="{{old('email')??Auth::guard()->user()->email}}"
                               @error('email')autofocus @enderror
                        >  @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 col-lg-6 col-sm-12">
                        <label for="">Giới tính</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender"
                                   value="1" {{(Auth::guard()->user()->gender==1)?'checked='.'checked':''}}>
                            <label class="form-check-label" for="inlineRadio1">Nam</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender"
                                   value="0" {{(Auth::guard()->user()->gender==0)?'checked='.'checked':''}}>
                            <label class="form-check-label" for="inlineRadio2">Nữ</label>
                        </div>
                        @error('gender')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 col-lg-6 col-sm-12">
                        <label for="">Ảnh </label>
                        <input type="file" class="form-control image-input" name="image"
                        >
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm 12 ">
                        <img src="{{asset('/images/users/'.Auth::guard()->user()->image)}}" alt="" width="100px" height="100px"
                             style="max-height: 100%;max-width: 100%" class="image-show student-image">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 col-lg-6 col-sm-12">
                        <label for="">Số điện thoại </label>
                        <input type="phone" class="form-control " name="phone"
                               value="{{old('phone')??Auth::guard()->user()->phone}}" @error('phone')autofocus @enderror
                        >
                        @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12 col-lg-12 col-sm-12">
                        <label for="">Địa chỉ </label>
                        <textarea id="address" type="text" class="form-control" name="address"
                                  @error('address')autofocus @enderror
                                  required>{{old('address')??Auth::guard()->user()->address}}</textarea>
                        @error('address')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </form>
        </div>
    </section>


    <!-- Related Products -->


@endsection
@section('js')

@endsection
