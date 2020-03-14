<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use ThrottlesLogins;

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request, bool $key = false)
    {
        $rememberMe = $request->has('remember_me') && $request->remember_me == 'on';

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        $auth = false;
        if ($key) {
            $auth = User::where('email_token', $request->email_token)->first();
            if ($auth) Auth::login($auth);
        } else {
            $credentials = $request->only('username', 'password');
            $auth = Auth::attempt($credentials, $rememberMe);
        }

        if ($auth) {
            $this->clearLoginAttempts($request);
            // Auth::logoutOtherDevices($request->password);
            return redirect()->intended('/');
        }

        $this->incrementLoginAttempts($request);
        return $this->showLoginForm();
    }

    public function showTokenLoginForm()
    {
        return view('auth.login_token');
    }

    public function tokenLogin(Request $request)
    {
        return $this->authenticate($request, true);
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
