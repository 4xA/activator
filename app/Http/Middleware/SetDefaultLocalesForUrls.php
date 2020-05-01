<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\URL;

class SetDefaultLocalesForUrls
{
    public function handle($request, Closure $next)
    {
        if ($request->user()) {
            URL::defaults(['locale' => $request->user()->locale]);
        }
        return $next($request);
    }
}
