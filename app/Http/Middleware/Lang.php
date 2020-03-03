<?php

namespace App\Http\Middleware;

use App;
use Closure;
use Session;

class Lang
{
    private array  $lang = ['en', 'vn'];

    public function handle($request, Closure $next)
    {
        if (session('lang')) {
            App::setLocale(session('lang'));

            var_dump(App::setLocale('vn'));
        }
        return $next($request);
    }

    private function checkLangIsset($lang): bool
    {
        return in_array($lang, $this->lang, true);
    }
}
