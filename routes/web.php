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
    Route::get('/login', 'LoginController@showLoginForm')->name('login');
    Route::post('/login', 'LoginController@authenticate');
    // LOGOUT
    Route::post('/logout', 'LoginController@logout')->name('logout');
    // REGISTER
    Route::get('/register', 'RegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'RegisterController@register');
});

Route::middleware('auth')->group(function() {
    Route::get('/', function () {
        return view('index');
    })->name('index');
    Route::get('/home', 'HomeController@index')->name('home');
});
