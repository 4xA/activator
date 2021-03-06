<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class setLocal
{
    public function handle($request, Closure $next)
    {
        $user = $request->user();
        $route = $request->route()->getName();
        $locale = $request->route('locale');
        if ($user && $user->locale !== $locale) {
            return redirect()->route($route, ['locale' => $user->locale]);
        }
        App::setLocale($user->locale);
        return $next($request);
    }
}
