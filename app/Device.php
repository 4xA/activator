<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Device extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'image_path'
    ];

    public function user()
    {
        $this->belongsTo(User::class, 'user_id');
    }

    public function getImageAttribute()
    {
        return Storage::url($this->image_path);
    }
}
