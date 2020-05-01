<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Route;

class MiscController
{
    public function fun(Request $request)
    {
        $showTimes = $request->query('time', 'false');

        $times = ($showTimes === "true") ? self::times($request) : [];

        $times['time module'] = ($request->has('time')) ? 'active' : 'inactive';

        $pathInfo = [
            'path (uri)' => $request->path(),
            'is' => $request->is('misc/*') ? 'misc' : 'not misc',
            'url' => $request->url(),
            'full url' => $request->fullUrl(),
            'method' => $request->method(),
            'isPost' => $request->isMethod('post') ? 'yes' : 'no',
            'filled path' => $request->filled('path') ? 'yes' : 'no'
        ];

        $pathInfo['path module'] = ($request->has('path')) ? 'active' : 'inactive';

        $routeInfo = [
            'Route::current()' => get_class(Route::current()),
            'Route::currentRouteName()' => Route::currentRouteName(),
            'Route::currentRouteAction()' => Route::currentRouteAction(),
        ];

        $urlInfo = [
            'url()->current()' => url()->current(),
            'url()->full()' => url()->full(),
            'url()->previous()' => url()->previous(),
            'action()' => action('MiscController@cookies'),
        ];
        
        return view('misc.fun', compact('times', 'pathInfo', 'routeInfo', 'urlInfo'));
    }

    public function cookies(Request $request)
    {
        Cookie::queue(Cookie::Make('batch_0', 'chocolate_chips_' . rand(), 1));
        return view('misc.cookies');
    }

    public function createCookie(Request $request)
    {
        $key = $request->input('key');
        $value = $request->input('value');
        $minutes = $request->input('minues', 1);

        $cookie = cookie($key, $value, $minutes);

        return redirect()->route('misc.cookies')->cookie($cookie);
    }

    private static function times(Request $request)
    {
        $times = [];

        $start = Carbon::now();
        for ($i = 0; $i < 1000000; $i++) {
            Auth::user();
        }
        $end = Carbon::now();
        $time = $start->diffInMilliseconds($end);

        $times['Auth::user()'] = "$time milliseconds";

        $start = Carbon::now();
        for ($i = 0; $i < 1000000; $i++) {
            auth()->user();
        }
        $end = Carbon::now();
        $time = $start->diffInMilliseconds($end);

        $times['auth()->user()'] = "$time milliseconds";

        $start = Carbon::now();
        for ($i = 0; $i < 1000000; $i++) {
            $request->user();
        }
        $end = Carbon::now();
        $time = $start->diffInMilliseconds($end);

        $times['$request->user()'] = "$time milliseconds";

        return $times;
    }
}
