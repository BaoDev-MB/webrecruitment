<?php

Route::get('/', function () {
    return view("index");
})->name('welcome');
Route::get('login', 'LoginController@showLogin')->name('login');
Route::post('login', 'LoginController@doLogin')->name('login');

Route::get('register', 'RegisterController@register')->name('register');
Route::post('register', 'RegisterController@doRregister')->name('register');
Route::get('register', 'RegisterController@showRegister')->name('register');
Route::get('confirmemail/{email}/{key}', 'RegisterController@confirmEmail')->name('confirmemail');

Route::get('forgetpass', 'ForgetPasswordController@forgetPass')->name('forgetpassword');
Route::post('forgetpass', 'ForgetPasswordController@doForgetPass')->name('forgetpass');
Route::get('confirmforgetpass/{email}/{key}', 'ForgetPasswordController@doConfirmPassword')->name('doconfirmpass');

Route::post('resetpass/{email}/{key}', 'ForgetPasswordController@resetPass')->name('resetpass');

//Route::get('messconfirm', 'ConfirmEmail@messengerConfirmEmail');
//Route::post('emailconfirm', 'ConfirmEmail@confirmEmail')->name('confirm');




Route::post('profile', 'AuthController@doProfile')->name('profile');
Route::get('logout', 'AuthController@doLogout')->name('logout');
Route::get('profile', 'AuthController@profile')->name('profile');


Route::get('profile/edit', 'AuthController@editProfile')->name('editprofile');

