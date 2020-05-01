<?php

namespace App\Http\Controllers\Users;

use App\User;
use App\Http\Controllers\Controller;

class MailController extends Controller
{
    public function subscribe(User $user)
    {
        // TODO mail unsubscribe
        $user->subscribed_to_mail = true;
        $user->save();
        return back()->with([
            'status' => 'success',
            'message' => 'subscribed successfully'
        ]);
    }

    public function unsubscribe(User $user)
    {
        // TODO mail unsubscribe
        $user->subscribed_to_mail = false;
        $user->save();
        return back()->with([
            'status' => 'success',
            'message' => 'unsubscribed successfully'
        ]);
    }
}
