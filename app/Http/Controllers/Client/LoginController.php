<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\CreateGestRequest;
use App\Http\Requests\Users\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Auth;
class LoginController extends Controller
{
    public function getlogin()
    {
            return view('clients.login.login');
    }

    public function login(LoginRequest $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
        if (Auth::attempt($data)) {
            return redirect()->route('home')->with('message','Đăng nhập  thành công thành công');
        } else {
            return back()->with('message1','Đăng nhập không thành công thành công');
        }


    }

    public function getregister()
    {
        return view('clients.login.register');
    }

    public function register(CreateGestRequest $request)
    {
          $data=$request->all();
          $data['image']='default.jpg';
          $data['gender']=1;
          $user=User::create($data);
          $user->assignRole('CUSTOMER');

          return redirect()->route('login.login')->with('message','Tạo tài khoản thành công');
    }

    public function logout()
    {
            Auth::guard()->logout();
            return back();
    }
}
