<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = [
        'user_id',
        'name'
    ];

    public function user()
    {
        $this->belongsTo(User::class, 'user_id');
    }
}
