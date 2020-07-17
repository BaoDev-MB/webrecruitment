<?php


Route::get('/', 'HomeController@index')->name('index');


Route::get('login', 'Auth\LoginController@showLogin')->name('login');
Route::post('login', 'Auth\LoginController@doLogin');

Route::get('register', 'Auth\RegisterController@register')->name('register');
Route::post('register', 'Auth\RegisterController@doRegister')->name('register');
Route::get('register', 'Auth\RegisterController@showRegister')->name('register');
Route::get('confirmemail/{email}/{key}', 'Auth\RegisterController@confirmEmail')->name('confirmemail');

Route::get('forgetpass', 'Auth\ForgetPasswordController@forgetPass')->name('forgetpass');
Route::post('forgetpass', 'Auth\ForgetPasswordController@doForgetPass')->name('forgetpass');
Route::get('confirmforgetpass/{email}/{key}', 'Auth\ForgetPasswordController@doConfirmPassword')->name('doconfirmpass');

Route::post('resetpass/{email}/{key}', 'Auth\ForgetPasswordController@resetPass')->name('resetpass');


Route::get('notify', function () {
    return view('pages.notify');
})->name('notify');

//Route::get('messconfirm', 'ConfirmEmail@messengerConfirmEmail');
//Route::post('emailconfirm', 'ConfirmEmail@confirmEmail')->name('confirm');

Route::get('logout', 'AuthController@doLogout')->name('logout');


Route::resource('jobs', 'JobController');

Route::resource('resumes', 'ResumeController');
Route::get('test', 'JobController@test');

Route::get('job/apply', 'ApplyJobController@applyJob')->name('apply');

Route::get('manage-applications', 'ManageApplicationsController@index');
Route::get('companyjobs', 'CompanyJobsControler@showJobs')->name('companyjobs')->middleware('checklogin', 'checkiscompany');

Route::get('test', 'ProfileController@changePass12');

Route::resource('profile', 'ProfileController');

//Route::resource('profile/{id}/changePass','ProfileController@changePass');
