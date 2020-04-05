<?php

namespace App\Http\Middleware;

use Closure;

class LogAction
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        logger(\Route::currentRouteAction());
        return $next($request);
    }
}
