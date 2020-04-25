<?php

use App\Device;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeviceTogglesSeeder extends Seeder
{
    public function run()
    {
        foreach (Device::all() as $device) {
            DB::table('device_toggles')->insert([
                'device_id' => $device->id,
                'key' => 'power_switch',
                'value' => 'off'
            ]);
        }
    }
}
