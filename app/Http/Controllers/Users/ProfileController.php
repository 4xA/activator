<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
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

    public function showProfileImage ()
    {
        return response()->file(public_path('/img/default_profile.jpg'));
    }

    public function downloadInfo ()
    {
        $user = Auth::user();
        return response()->streamDownload(function () {
            return $this->userInfo();
        }, "{$user->username}.txt");
    }

    private function userInfo ()
    {
        $user = Auth::user();
        echo <<<EOT
Name: {$user->first_name} {$user->last_name}
Username: {$user->username}
email: {$user->email}
EOT;
    }
}
