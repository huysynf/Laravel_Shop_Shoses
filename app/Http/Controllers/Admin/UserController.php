<?php

namespace App\Http\Controllers\Admin;

use App\Events\NewCustomerHasRegister;
use App\Http\Controllers\Controller;
use App\Http\Requests\Users\ChangePasswordRequest;
use App\Http\Requests\Users\CreateRequest;
use App\Http\Requests\Users\UpdateRequest;
use App\Mail\WelcomeNewUserMail;
use App\Repositories\admin\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index(Request $request)
    {
        $condition = [
            'name' =>$request->input('name'),
            'email' => $request->input('email'),
            'address' =>$request->input('address'),
            'role'=>$request->input('role'),
        ];
        $users = $this->userRepository->search($condition);

        return view('admins.users.index', compact('users'));
    }

    public function create()
    {
        return view('admins.users.create');
    }

    public function store(CreateRequest $request)
    {
        $data = $this->userRepository->formatRequest($request);
        $user = $this->userRepository->store($data);

        event(new NewCustomerHasRegister($user));

        return redirect()->route('users.create')->with('message', 'Thêm thành công người dùng: ' . $user->name);
    }

    public function show($id)
    {
        $user=$this->userRepository->getById($id)->toArray();

        return response()->json([
            'status'=>200,
            'data'=>$user
        ]);
    }


    public function edit($id)
    {
        $data=$this->userRepository->getDataToEditBy($id);

        return view('admins.users.edit')->with(['user'=>$data['user'],'listRoles'=>$data['listRoles']]);
    }


    public function update(UpdateRequest $request, $id)
    {
        $data=$this->userRepository->formatRequest($request);
        $user=$this->userRepository->update($data,$id);

        return redirect()->route('users.index')->with('message', 'Cập nhật  thành công người dùng: ' . $user->name);
    }


    public function destroy($id)
    {
        $user=$this->userRepository->destroy($id);

        return response()->json([
            'status'=>200,
            'message'=>'Xóa thành công :'.$user->name,
        ]);
    }

    public function changePassword(ChangePasswordRequest $request, $id)
    {
        $message=$this->userRepository->changePassword($request->input('password'), $id);

        return response()->json([
            'status' => 200,
            'message' => $message,
        ]);
    }
}
