@extends('admins.layouts.app')

@section('title',' Quản lý người dùng ')

@section('content')
    <div class="d-flex  mb-4">
        <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
        <a title="Thêm mới sản phẩm" class="btn btn-outline-primary btn-circle ml-2" href="{{route('users.create')}}">
            <i class="fa fa-plus"></i>
        </a>
    </div>
    <div class="row d-flex mb-1">
        <div class="col-12 d-flex">
            <form method="get" action="{{route('users.index')}}" class=" p-1 d-flex"
                  id="subjectFormSearch">
                <div class="d-flex flex-column">
                    <lable class="text-primary" for="name">Tên tìm kiếm</lable>
                    <input value="{{request()->input('name')}}" class="h-50" type="text" placeholder="Tên tìm kiếm..."
                           name="name">
                </div>
                <div class="d-flex flex-column ml-1">
                    <lable class="text-primary" for="sale">Email</lable>
                    <input value="{{request()->input('email')}}" class="h-50" type="text"
                           placeholder="Email..." name="email">
                </div>
                <div class="d-flex flex-column ml-1">
                    <lable class="text-primary" for="role">Địa chỉ</lable>
                    <input value="{{request()->input('address')}}" class="h-50" type="text"
                           placeholder="Địa chỉ ..." name="address">
                </div>
                <div class="d-flex flex-column ml-1">
                    <lable class="text-primary" for="role">Tên quyền</lable>
                    <select name="role" class="h-50 user-select-role " style="width: 300px">
                        <option value="">Tất cả</option>
                        @foreach($roleNames as $role)
                            <option
                                value="{{$role}}" {{(request()->input('role')==$role)?'selected':''}}>{{$role}}</option>
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
            {{--            <p class="p-2">Tổng cộng:{{$products->total()}}</p>--}}
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
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Ảnh</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Giới tính</th>
                    <th>Tùy chọn</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td><strong></strong></td>
                        <td>
                            <img src="{{asset('/images/users/'.$user->image)}}"
                                 style="max-width: 50px;max-height: 50px;" width="100%" height="100%"
                                 alt="{{$user->name}}">
                        </td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->gender==1?'Nam':'Nữ '}}</td>
                        <td>
                            <a href="{{route('users.edit',$user->id)}}" class="btn btn-circle btn-outline-warning"
                               title="Cập nhật "> <i class="fa fa-edit"></i></a>
                            <button class="btn btn-circle btn-outline-info show-user"
                                    data-toggle="modal" data-target="#showUserModal"
                                    title="xem thông tin    "
                                    show="{{$user->id}}"> <i class="fa fa-info"></i></button>
                            <button class="btn btn-circle btn-outline-danger delete-user" title="Xóa "
                                    delete="{{$user->id}}"> <i class="fa fa-trash"></i></button>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
        <div>

        </div>
    </div>
    @include('admins.users.show_modal')
@endsection
@section('js')
    <script src="{{asset('js/user.js')}}"></script>
@endsection
