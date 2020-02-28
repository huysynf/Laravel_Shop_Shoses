@extends('admins.layouts.app')

@section('title',' Quản lý Nhóm quyền  ')

@section('content')
    <div class="d-flex  mb-4">
        <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
        @can('new role')
            <a title="Thêm mới sản phẩm" class="btn btn-outline-primary btn-circle ml-2"
               href="{{route('roles.create')}}">
                <i class="fa fa-plus"></i>
            </a>
        @endcan
    </div>
    <div class="row d-flex mb-1">
        <div class="col-12 d-flex">
            <form method="get" action="{{route('roles.index')}}" class=" p-1 d-flex"
                  id="subjectFormSearch">
                <div class="d-flex flex-column">
                    <lable class="text-primary" for="role">Tên tìm kiếm</lable>
                    <input value="{{request()->input('role')}}" class="h-50" type="text" placeholder="Tên tìm kiếm..."
                           name="name">
                </div>
                <div class="d-flex flex-column ml-1">
                    <lable class="text-primary" for="sale">Quyền</lable>
                    <select name="permission" class="select-permission-search" style="width: 300px">
                        <option value="">Tất cả</option>
                        @foreach($permissions as $permission)
                            <option
                                value="{{$permission->name}}" {{(request()->input('permission')==$permission->name)?'selected':''}}>{{$permission->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="align-self-end ml-1">
                    <button class="btn btn-primary  aqua-gradient btn-rounded btn-sm my-0" type="submit"
                            title="Tìm kiếm">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>

            </form>
        </div>

        <div class="text-dark">
            <p class="p-2">Tổng cộng:{{$roles->total()}}</p>
        </div>
    </div>
    @if(session('message'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong> {{session('message')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="row" id="product">
        <div class="col-12">
            <table class="table table-bordered table-hover table-responsive">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Danh sách quyền</th>
                    <th>Tùy chọn</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td><strong></strong></td>
                        <td>{{$role->name}}</td>
                        <td>
                            @foreach($role->permissions as $permission)
                                <span class="text-primary">{{$permission->name}} ,</span>
                            @endforeach
                        </td>
                        <td>
                            @if(!$role->isRoleDefault())
                                @can('update role')
                                    <a href="{{route('roles.edit',$role->id)}}"
                                       class="btn btn-circle btn-outline-warning"
                                       title="Cập nhật "> <i class="fa fa-edit"></i></a>
                                @endcan
                                @can('delete role')
                                    <button class="btn btn-circle btn-outline-danger delete-role" title="Xóa "
                                            delete="{{$role->id}}"><i class="fa fa-trash"></i></button>
                                @endcan
                            @else
                                <span class="text-danger">Quyền mặc định của hệ thống</span>
                            @endif

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div>
            {{$roles}}
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('js/roles.js')}}"></script>
@endsection
