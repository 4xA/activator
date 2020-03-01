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
        logger('User has registerd');
        $name = $event->user->first_name . " " . $event->user->last_name;
        logger("user name is $name");
    }
}
