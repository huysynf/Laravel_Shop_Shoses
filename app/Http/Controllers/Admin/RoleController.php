<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Roles\CreateRequest;
use App\Http\Requests\Roles\UpdateRequest;
use App\Models\Role;
use App\Repositories\admin\RoleRepository;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    private RoleRepository $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->setRepository($roleRepository);
    }

    public function setRepository($repository)
    {
        return $this->roleRepository = $repository;
    }

    public function index(Request $request)
    {
        $name=$request->input('role');
        $permission=$request->input('permission');
        $roles=$this->roleRepository->search($name,$permission);

        return view('admins.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('admins.roles.create');
    }

    public function store(CreateRequest $request)
    {
        $data = $this->roleRepository->formatRequest($request);

        $role = $this->roleRepository->store($data);

        return redirect()->route('roles.create')->with('message', 'Tạo nhóm quyền ' . $role->name . ' thành công');
    }

    public function edit($id)
    {
        $role = $this->roleRepository->getById($id);
        if ($role->isRoleDefault()) {
            abort(404);
        }

        $permissionIds = $this->roleRepository->getPermissionIdBy($id);

        return view('admins.roles.edit', compact('role', 'permissionIds'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $this->roleRepository->formatRequest($request);
        $role = $this->roleRepository->update($data, $id);

        return redirect()->route('roles.index')->with('message', 'Cập nhật   nhóm quyền ' . $role->name . ' thành công');
    }

    public function  destroy($id)
    {
        $role=$this->roleRepository->deleteById($id);

        return response()->json([
            'status'=>200,
            'message'=>'Xóa nhóm quyền  Thành công ',
        ]);
    }
}
