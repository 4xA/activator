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
    Route::post('/users/logout', 'LoginController@logout')->name('logout');
    // REGISTER
    Route::get('/users/register', 'RegisterController@showRegistrationForm')->name('register');
    Route::post('/users/register', 'RegisterController@register');
});

Route::namespace('Devices')->group(function() {
    Route::resource('device', 'DeviceController')->except(['index']);
});

Route::middleware('auth')->group(function() {
    Route::get('/', function () {
        return view('index');
    })->name('index');
    Route::get('/home', 'HomeController@index')->name('home');
});

Route::get('/fun', 'MiscController@fun');