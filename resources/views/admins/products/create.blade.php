@extends('admins.layouts.app')

@section('title',' Thêm mới sản phầm')

@section('content')
    <div class="d-flex  mb-4">
        <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
        <a title="Quay lại trang quản lý" class="btn btn-outline-primary btn-circle ml-2"
           href="{{route('products.index')}}">
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
            <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6 col-lg-6 col-sm-12">
                        <label for="">Tên sản phẩm</label>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}" required>
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 col-lg-6 col-sm-12">
                        <label for="">Mã sản phẩm </label>
                        <input type="text" class="form-control " name="product_key" value="{{old('product_key')}}"
                        >
                        @error('product_key')
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

                        <img src="" alt="" width="100px" height="100px"
                             style="max-height: 100%;max-width: 100%" class="image-show student-image">

                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 col-lg-6 col-sm-12">
                        <label for="">Chọn danh mục</label>
                        <select name="categories[]" id="" class="form-control product-select-category" multiple>
                            @foreach($categories as $category)
                                <option
                                    value="{{$category->id}}" {{in_array($category->id,old('categories',[]))? 'selected' : '' }}>{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('categories')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 col-lg-6 col-sm-12">
                        <label for="">Sale</label>
                        <input type="text" class="form-control " name="sale" value="{{old('sale')??0}}"
                               required>
                        @error('sale')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12 col-lg-6 col-sm-12">
                        <label for="">Trạng thái</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status"
                                   value="1" {{(old('status')==0)?"checked="."checked":""}}>
                            <label class="form-check-label" for="inlineRadio1">Hiện thị</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status"
                                   value="0" {{(old('status')==1)?"checked="."checked":""}}>
                            <label class="form-check-label" for="inlineRadio2">Không hiện thị</label>
                        </div>
                        @error('gender')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-12 col-lg-12 col-sm-12">
                        <label for="">Mô tả</label>
                        <textarea id="description" type="text" class="form-control" name="description" required>{{old('description')}}</textarea>
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary "><i class="fa fa-plus"></i>Thêm mới</button>
            </form>
        </div>
    </div>

@endsection
@section('js')
    <script >
        CKEDITOR.replace( 'description', {
            filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',

        } );
    </script>

@endsection
@include('ckfinder::setup')
