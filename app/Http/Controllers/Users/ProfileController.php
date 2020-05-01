<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class ProfileController extends Controller
{
    public function showProfileForm ()
    {
        $user = Auth::user();
        $mailRoute = $user->subscribed_to_mail
                                ? URL::signedRoute('users.mail.unsubscribe', compact('user'))
                                : URL::signedRoute('users.mail.subscribe', compact('user'));
        return view('users.profile', compact('user', 'mailRoute'));
    }
}
