@extends('admins.layouts.app')

@section('title',' Cập nhật  mã giảm giá'.$coupon->code)

@section('content')
    <div class="d-flex  mb-4">
        <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
        <a title="Quay lại trang quản lý" class="btn btn-outline-primary btn-circle ml-2"
           href="{{route('coupons.index')}}">
            <i class="fa fa-undo"></i>
        </a>
    </div>
    @if(session('message'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong> {{session('message')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="row">
        <div class="col-12 col-lg-8 col-md-10">
            <form action="{{route('coupons.update',$coupon->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <button type="submit" class="btn btn-outline-primary mb-1"><i class="fa fa-pen"></i>Cập nhật</button>
                <div class="row">
                    <div class="form-group col-md-6 col-lg-6 col-sm-12">
                        <label for="">Mã giảm giá</label>
                        <input style="text-transform: uppercase" type="text" class="form-control" name="code"
                               value="{{old('code')??$coupon->code}}"
                               @error('code')autofocus @enderror>
                        @error('code')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 col-lg-6 col-sm-12">
                        <label for="">Thể loại </label>
                        <select name="type" class="form-control">
                            <option value="">--- Chọn thể loại ---</option>
                            <option value="percent" {{$coupon->type=='percent'?'selected':''}}>Phẩn trăm</option>
                            <option value="cash" {{$coupon->type=='cash'?'selected':''}}>Tiền mặt</option>
                        </select>
                        @error('type')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 col-lg-6 col-sm-12">
                        <label for="">Giá trị</label>
                        <input type="text" class="form-control " name="value" value="{{old('value')??$coupon->value}}"
                               @error('value')autofocus @enderror
                               required>
                        @error('value')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 col-lg-6 col-sm-12">
                        <label for="">Trạng thái</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status"
                                   value="1" {{$coupon->status==1?'checked='.'checked':''}}>
                            <label class="form-check-label" for="inlineRadio1">Hiệu lực</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status"
                                   value="0" {{$coupon->status==0?'checked='.'checked':''}}>
                            <label class="form-check-label" for="inlineRadio2">Không hiệu lực</label>
                        </div>
                        @error('gender')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 col-lg-6 col-sm-12">
                        <label for="">Ngày hết hạn </label>
                        <input type="date" class="form-control " name="expiry_date"
                               value="{{old('expiry_date')??$coupon->expiry_date}}"
                               @error('expiry_date')autofocus @enderror
                               required>
                        @error('expiry_date')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 col-lg-6 col-sm-12">
                        <label for="">Số lượng </label>
                        <input type="text" class="form-control " name="quantity"
                               value="{{old('quantity')??$coupon->quantity}}"
                               @error('quantity')autofocus @enderror
                               required>
                        @error('quantity')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

