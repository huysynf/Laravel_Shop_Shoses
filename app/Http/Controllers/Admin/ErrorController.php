<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function notfound()
    {
        return view('admins.errors.error_notfound');
    }

    public function forbidden()
    {
        return view('admins.errors.error_forbidden');
    }
}
