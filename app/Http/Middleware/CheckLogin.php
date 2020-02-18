<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckLogin
{

    public function handle($request, Closure $next)
    {
        if (Auth::guard()->check()) {
            return $next($request);
        } else {
            return redirect()->route('login.login');
        }

    }
}
