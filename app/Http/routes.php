<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Used to create compatability with Angular {{ }} body tags
Blade::setContentTags('<%', '%>');        // for variables and all things Blade
Blade::setEscapedContentTags('<%%', '%%>');   // for escaped data

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return redirect('/');
});


Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');

Route::get('logout', 'Auth\AuthController@getLogout');

// Forgot Password routes...
Route::get('forgot-password', 'Auth\PasswordController@getEmail');
Route::post('forgot-password', 'Auth\PasswordController@postEmail');

// Reset Password routes...
Route::get('/password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('/password/reset/', 'Auth\PasswordController@postReset');

// Register Routes...
Route::get('register', 'UserRegController@getReg');
Route::post('register', 'UserRegController@postReg');
// Account Settings Routes...
Route::get('account', 'AccountController@getAccount');
Route::post('account/info', 'AccountController@updateInfo');
Route::post('account/email', 'AccountController@updateEmail');
Route::post('account/password', 'AccountController@changePassword');

// API Routes
Route::get('api/get-announcements', 'AnnouncementController@getAnnouncements');
Route::post('api/create-announcement', 'AnnouncementController@createAnnouncement');
