<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailVerficationNotification
{
    public function __construct()
    {
    }

    public function handle(UserRegistered $event)
    {
        $name = $event->user->first_name . " " . $event->user->last_name;
        $username = $event->user->username;
        logger("New user registered ({$name}) with the username {$username}");
    }
}
