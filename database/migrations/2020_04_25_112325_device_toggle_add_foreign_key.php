<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeviceToggleAddForeignKey extends Migration
{
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        DB::raw('alter table `device_toggles` add constraint `device_toggles_device_id_foreign` foreign key (`device_id`) references `devices` (`id`)');
    }

    public function down()
    {
    }
}
