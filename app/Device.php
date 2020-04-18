<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Device extends Model
{
    protected $fillable = [
        'type_id',
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

    public function type()
    {
        return $this->belongsTo(DeviceType::class, 'type_id');
    }

    public function resolveRouteBinding($value)
    {
        return $this->where('id', $value)->first();
    }
}
