<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeviceType extends Model
{
    protected $fillable = [
        'name'
    ];

    public function devices()
    {
        return $this->hasMany(Device::class, 'type_id');
    }

    public function getRouteKeyName()
    {
        return 'name';
    }
}
