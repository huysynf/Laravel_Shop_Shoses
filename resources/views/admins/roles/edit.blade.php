@extends('admins.layouts.app')

@section('title',' Cập nhật  nhóm quyền: '.$role->name)

@section('content')
    <div class="d-flex  mb-4">
        <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
        <a title="Quay lại trang quản lý" class="btn btn-outline-primary btn-circle ml-2"
           href="{{route('roles.index')}}">
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
            <form action="{{route('roles.update',$role->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <button type="submit" class="btn btn-outline-primary mb-1"><i class="fa fa-edit"></i>Cập nhật </button>
                <div class="row">
                    <div class="form-group ">
                        <label class="text-dark">Tên nhóm quyền</label>
                        <input type="text" class="form-control text-uppercase" name="name" value="{{old('name')??$role->name}}"
                               @error('name')autofocus @enderror>
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <div class="row">
                    <div class="form-group col-md-6 col-lg-6 col-sm-12">
                        <label class="text-dark">Chọn quyền</label>
                        <div class="row">
                            <div class="form-check-inline col-4 m-0">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input   select-all" value=""> Chọn
                                    tất cả
                                </label>
                            </div>
                            @foreach($permissions as $permission)
                                <div class="form-check-inline col-4 m-0">
                                    <label class="form-check-label">
                                        @if($permission->name==='not permission')
                                            <input type="checkbox" class="form-check-input  un-select-all"
                                                   name="permissions[]"
                                                   value="{{$permission->id}}" {{ in_array($permission->id,$permissionIds) ? 'checked' : '' }}>
                                            Không
                                            có quyền
                                        @else
                                            <input type="checkbox" class="form-check-input   select-item"
                                                   name="permissions[]"
                                                   {{ in_array($permission->id,$permissionIds) ? 'checked' : '' }}
                                                   value="{{$permission->id}}">{{$permission->name}}
                                        @endif
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        @error('permissions')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('js/roles.js')}}"></script>
@endsection
