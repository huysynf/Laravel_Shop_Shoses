@extends('admins.layouts.app')

@section('title',' Thêm mới người dùng')

@section('content')
    <div class="d-flex  mb-4">
        <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
        <a title="Quay lại trang quản lý" class="btn btn-outline-primary btn-circle ml-2"
           href="{{route('users.index')}}">
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
            <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <button type="submit" class="btn btn-outline-primary mb-1"><i class="fa fa-plus"></i>Thêm mới</button>
                <div class="row">
                    <div class="form-group col-md-6 col-lg-6 col-sm-12">
                        <label for="">Tên </label>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}"
                               @error('name')autofocus @enderror>
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 col-lg-6 col-sm-12">
                        <label for="">Email </label>
                        <input type="text" class="form-control " name="email" value="{{old('email')}}"
                               @error('email')autofocus @enderror
                        >
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 col-lg-6 col-sm-12">
                        <label for="">Giới tính</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender"
                                   value="1" {{(old('gender')==1)?'checked='.'checked':''}}>
                            <label class="form-check-label" for="inlineRadio1">Nam</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender"
                                   value="0" {{(old('gender')==0)?'checked='.'checked':''}}>
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
                        @error('image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm 12 ">

                        <img src="{{asset('/images/users/default.jpg')}}" alt="" width="100px" height="100px"
                             style="max-height: 100%;max-width: 100%" class="image-show student-image">

                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 col-lg-6 col-sm-12">
                        <label for="">Mật khẩu </label>
                        <input type="password" class="form-control " name="password"
                               value="{{old('password')}}"
                        >
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 col-lg-6 col-sm-12">
                        <label for="">Nhập lại mật khẩu</label>
                        <input type="password" class="form-control " name="password_confirmation"
                               value="{{old('password_confirmation')}}"
                        >
                        @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <div class="row">
                    <div class="form-group col-md-6 col-lg-6 col-sm-12">
                        <label for="">Số điện thoại </label>
                        <input type="phone" class="form-control " name="phone"
                               value="{{old('phone')}}" @error('phone')autofocus @enderror
                        >
                        @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 col-lg-6 col-sm-12">
                        <label for="">Quyền </label>
                        <select name="role" id="" class="form-control user-select-role">
                            <option value=" ">---Chọn quyền --</option>
                            @foreach($roleNames as $role)
                                <option value="{{$role}}"  {{(old('role')==$role)?'selected':''}}>{{$role}}</option>
                            @endforeach
                        </select>
                        @error('role')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <div class="row">

                    <div class="form-group col-md-12 col-lg-12 col-sm-12">
                        <label for="">Địa chỉ </label>
                        @error('address')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <textarea id="address" type="text" class="form-control" name="address"
                                  @error('address')autofocus @enderror
                                  required>{{old('address')}}</textarea>

                    </div>

                </div>
            </form>
        </div>
    </div>

@endsection
@section('js')
    <script>
        CKEDITOR.replace('address', {
            filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',

        });
    </script>


@endsection
@include('ckfinder::setup')
