<?php

Route::group(['middleware' => 'auth.basic'], function() {
    Route::group(['namespace' => 'Admin'], function() {
        Route::get('/', 'AdminController')->name('admin.index');
    });

    Route::group(['prefix' => '/device/type', 'namespace' => 'Devices'], function() {
        Route::get('create', 'DeviceTypeController@create')->name('devices.types.create');
        Route::post('store', 'DeviceTypeController@store')->name('devices.types.store');
    });
});

Route::any('/users/logout', 'AdminController@logout')->name('admin.logout');
