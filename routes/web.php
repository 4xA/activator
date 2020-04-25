<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::namespace('Users')->group(function () {
    // LOGIN
    Route::get('/users/login', 'LoginController@showLoginForm')->name('login');
    Route::post('/users/login', 'LoginController@authenticate');
    Route::get('/users/login/token', 'LoginController@showTokenLoginForm')->name('login.token');
    Route::post('/users/login/token', 'LoginController@tokenLogin');
    // LOGOUT
    Route::any('/users/logout', 'LoginController@logout')->name('logout');
    // REGISTER
    Route::get('/users/register', 'RegisterController@showRegistrationForm')->name('register');
    Route::post('/users/register', 'RegisterController@register');
    // API
});


Route::group(['middleware' => ['auth', 'throttle:rate_limit,1']], function() {
    Route::get('/', 'HomeController@index')->name('index');
    Route::get('/home', 'HomeController')->name('home');

    Route::namespace('Devices')->group(function() {
        Route::get('/precede', 'DeviceController@precede');
        Route::resource('devices', 'DeviceController')->except(['index'])->names([
            'show' => 'devices.preview'
        ]);
        Route::get('{device}/panel', 'DeviceController@panel')->name('devices.panel');
        Route::post('{device}/toggle', 'DeviceController@toggle')->name('devices.toggle');
    });
});

Route::group(['prefix' => 'misc'], function() {
    Route::get('/fun/{times?}', 'MiscController@fun')->name('misc.fun');
    Route::get('/cookies', 'MiscController@cookies')->name('misc.cookies');
    Route::post('/cookies/create', 'MiscController@createCookie')->name('misc.cookies.create');
});