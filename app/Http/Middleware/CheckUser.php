<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckUser
{

    public function handle($request, Closure $next)
    {
        if (Auth::user()->hasPermissionTo('not permission')) {
            return redirect()->route('home');
        }
        return $next($request);
    }
}
