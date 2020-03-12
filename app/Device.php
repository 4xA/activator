<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = [
        'name'
    ];

    public function user()
    {
        $this->belongsTo(User::class, 'user_id');
    }
}
