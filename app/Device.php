<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Device extends Model
{
    protected $table = "devices";

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

    public function toggles()
    {
        return $this->hasMany(DeviceToggles::class, 'device_id');
    }

    public function togglesArray()
    {
        $data = [];
        foreach ($this->toggles as $toggle) {
            $data[$toggle->key] = $toggle->value;
        }
        return $data;
    }

    public function type()
    {
        return $this->belongsTo(DeviceType::class, 'type_id');
    }

    public function getImageAttribute()
    {
        return Storage::url($this->image_path);
    }

    public function resolveRouteBinding($value)
    {
        return $this->where('id', $value)->first();
    }
}
