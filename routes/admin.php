<?php

Route::group(['middleware' => ['auth.basic', 'throttle:rate_limit,1']], function() {
    Route::group(['namespace' => 'Admin'], function() {
        Route::get('/', 'AdminController')->name('admin.index');
    });

    Route::group(['prefix' => '/devices/types', 'namespace' => 'Devices'], function() {
        Route::get('/create', 'DeviceTypeController@create')->name('devices.types.create');
        Route::post('/store', 'DeviceTypeController@store')->name('devices.types.store');
        Route::get('/', 'DeviceTypeController@index')->name('devices.types.index');
        Route::get('/{type}/edit', 'DeviceTypeController@edit')->name('devices.types.edit');
        Route::patch('/{type}', 'DeviceTypeController@update')->name('devices.types.update');
        Route::get('/table.json', 'DeviceTypeController@table')->name('devices.types.table');
    });
});

Route::namespace('Admin')->group(function () {
    Route::any('/admin/logout', 'AdminController@logout')->name('admin.logout');
});
