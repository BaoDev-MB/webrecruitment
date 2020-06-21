<?php

Route::get('/', function () {
    return view("pages.auth");
})->name('welcome');

Route::get('login', 'AuthController@login')->name('login');
Route::post('login', 'AuthController@doLogin')->name('login');
Route::post('signup', 'AuthController@doSignup')->name('signup');
Route::get('register', 'AuthController@login')->name('register');
Route::post('profile', 'AuthController@doProfile')->name('profile');
Route::get('logout', 'AuthController@doLogout')->name('logout');
Route::get('profile', 'AuthController@profile')->name('profile');


Route::get('profile/edit', 'AuthController@editProfile')->name('editprofile');


Route::get('messconfirm', 'ConfirmEmail@messengerConfirmEmail');
Route::get('confirmemail/{email}/{key}', 'AuthController@confirmEmail')->name('confirmemail');
Route::post('emailconfirm', 'ConfirmEmail@confirmEmail')->name('confirm');
Route::get('forgetpass1', 'AuthController@forgetPass')->name('forgetpassword');
Route::post('forgetpass', 'AuthController@doForgetPass')->name('forgetpass');
Route::get('confirmforgetpass/{email}/{key}', 'AuthController@doConfirmPassword')->name('doconfirmpass');
Route::post('resetpass/{email}/{key}', 'AuthController@resetPass')->name('resetpass');
