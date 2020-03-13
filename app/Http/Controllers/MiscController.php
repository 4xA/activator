<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class MiscController extends Controller
{
    public function fun(Request $request)
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

        return view('fun', compact('times'));
    }
}
