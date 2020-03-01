<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use ThrottlesLogins;

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $rememberMe = $request->has('remember_me') && $request->remember_me == 'on';

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials, $rememberMe)) {
            $this->clearLoginAttempts($request);
            return redirect()->intended('home');
        } 

        $this->incrementLoginAttempts($request);
        return $this->showLoginForm();
    }

    public function logout()
    {
        Auth::logout();
        
        return redirect()->route('index');
    }

    public function username()
    {
        return 'username';
    }
}
