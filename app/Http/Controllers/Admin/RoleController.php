<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $roles=Role::with('permissions')->paginate(5);
        return view('admins.roles.index',compact('roles'));
    }

    public function edit()
    {

    }
}
