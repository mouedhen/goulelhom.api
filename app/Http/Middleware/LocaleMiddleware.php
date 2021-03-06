<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->query('lang')) {
            App::setLocale($request->query('lang'));
            return $next($request);
        }
        if ($request->get('lang')) {
            App::setLocale($request->get('lang'));
        }
        return $next($request);
    }
}
