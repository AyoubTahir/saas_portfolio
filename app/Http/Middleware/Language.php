<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class Language
{
    public function handle(Request $request, Closure $next)
    {
        if (Session()->has('currentLang')) {
            App::setLocale(Session()->get('currentLang'));
        } else {
            App::setLocale(config('app.fallback_locale'));
        }

        return $next($request);
    }
}
