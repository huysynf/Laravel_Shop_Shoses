<?php

namespace App\Http\Middleware;

use Closure;

class CustomCKFinderAuth
{

    public function handle($request, Closure $next)
    {
        config([
            'ckfinder.authentication' => function () {
                return true;
            }
        ]);
        return $next($request);
    }

}
