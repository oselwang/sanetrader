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

Route::get('/', function () {
    return view('index');
});

// About Page (app/views/about.blade.php)
Route::get('about', function () {
    return view('about');
});

// Contact Page (app/views/contact.blade.php)
Route::get('contact', function () {
    return view('contact');
});

// Login Page (app/views/login.blade.php)
Route::get('login', function () {
    return view('login');
});

Route::group(['namespace' => 'Auth'], function () {
    Route::get('logout', 'AuthController@logout');

    Route::group(['middleware' => 'guest'], function () {
        Route::post('login', 'AuthController@login');
        Route::post('register', 'AuthController@register');
    });
});

Route::group(['namespace' => 'Account', 'middleware' => 'auth'], function () {
    Route::post('account/edit', 'AccountController@update');
});

// Edit Profile Page (app/views/edit-user.blade.php)
Route::get('edit-profile', function () {
    return view('edit-user');
});

//  Subscription Page (app/views/subscription.blade.php)
Route::get('subscription', function () {
    return view('subscription');
});
