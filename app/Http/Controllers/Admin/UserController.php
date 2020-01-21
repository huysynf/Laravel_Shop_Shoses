<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\CreateRequest;
use App\Repositories\admin\UserRepository;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    protected UserRepository $userRepository;


    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return view('admins.users.index');
    }


    public function create()
    {
        $roleNames=$this->userRepository->getAllRoleName();

        return  view('admins.users.create',compact('roleNames'));
    }


    public function store(CreateRequest $request)
    {
        $data = $this->userRepository->formatDate($request);
        $user = $this->userRepository->store($data);

        return redirect()->route('users.create')->with('message','Thêm thành công người dùng: '.$user->name);
    }



    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
