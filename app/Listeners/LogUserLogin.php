<?php

namespace App\Listeners;

use Carbon\Carbon;

class LogUserLogin
{
    public function __construct()
    {
    }

    public function handle($event)
    {
        $username = $event->user->username;
        $time = Carbon::now()->toDateTimeString();
        logger("User {$username} logged in at {$time}");
    }
}
