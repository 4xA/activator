<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeviceToggles extends Model
{
    protected $table = "device_toggles";

    protected $fillable = [
        'device_id',
        'key',
        'value'
    ];

    public function device()
    {
        return $this->belongsTo(Device::class, 'device_id', 'id');
    }

    public function getValueAttribute($value)
    {
        switch ($value) {
            case 'on':
                return 1;
                break;
            case 'off':
                return 0;
                break;
            default:
                return $value;
                break;
        }
    }
}
