<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Roles\CreateRequest;
use App\Repositories\admin\RoleRepository;
use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{

    private RoleRepository $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->setRepository($roleRepository);
    }

    public function setRepository($repository)
    {
        return $this->roleRepository=$repository;
    }

    public function index(Request $request)
    {
        $roles=Role::with('permissions')->paginate(5);
        return view('admins.roles.index',compact('roles'));
    }

    public function create()
    {
        return view('admins.roles.create');
    }

    public function store(CreateRequest $request)
    {
       $data=$this->roleRepository->formatRequest($request);

       $role=$this->roleRepository->store($data);

        return redirect()->route('roles.create')->with('message','Tạo nhóm quyền '.$role->name.' thành công');
    }

    public function edit()
    {

    }
}
