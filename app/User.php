<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'password',
        'locale',
        'is_admin',
        'subscribed_to_mail',
        'rate_limit',
        'email_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'email_token'
    ];

    public function devices()
    {
        return $this->hasMany(Device::class, 'user_id');
    }

    public function isAdmin()
    {
        return $this->is_admin;
    }
}
