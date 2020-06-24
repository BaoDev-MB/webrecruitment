<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view("index");
})->name('welcome');
Route::get('login', 'Auth\LoginController@showLogin')->name('login');
Route::post('login', 'Auth\LoginController@doLogin');

Route::get('register', 'Auth\RegisterController@register')->name('register');
Route::post('register', 'Auth\RegisterController@doRegister')->name('register');
Route::get('register', 'Auth\RegisterController@showRegister')->name('register');
Route::get('confirmemail/{email}/{key}', 'Auth\RegisterController@confirmEmail')->name('confirmemail');

Route::get('forgetpass', 'Auth\ForgetPasswordController@forgetPass')->name('forgetpassword');
Route::post('forgetpass', 'Auth\ForgetPasswordController@doForgetPass')->name('forgetpass');
Route::get('confirmforgetpass/{email}/{key}', 'Auth\ForgetPasswordController@doConfirmPassword')->name('doconfirmpass');

Route::post('resetpass/{email}/{key}', 'Auth\ForgetPasswordController@resetPass')->name('resetpass');

//Route::get('messconfirm', 'ConfirmEmail@messengerConfirmEmail');
//Route::post('emailconfirm', 'ConfirmEmail@confirmEmail')->name('confirm');




Route::post('profile', 'AuthController@doProfile')->name('profile');
Route::get('logout', 'AuthController@doLogout')->name('logout');
Route::get('profile', 'AuthController@profile')->name('profile');

Route::get('profile/edit', 'AuthController@editProfile')->name('editprofile');
