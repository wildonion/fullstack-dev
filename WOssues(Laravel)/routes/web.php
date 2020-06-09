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

// TODO:
// handle all exceptions => see Handler.php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');
Route::get('/home/usr/{name?}/pswd-{url_token}', 'UserController@showPasswordUpdateForm')->name('user.password.update');
Route::post('/update', 'UserController@UpdatePassword')->name('user.password.submit');

Route::prefix('admin')->group(function(){
	Route::get('/login', 'Auth\AdminLoginController@ShowLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    //AdminPasswordUpdate-routes
    Route::get('/usr/{name?}/pswd-{url_token}', 'AdminController@showPasswordUpdateForm')->name('admin.password.update');
    Route::post('/update', 'AdminController@UpdatePassword')->name('admin.password.submit');
    //register-routes
    Route::post('/register', 'Auth\AdminRegisterController@register')->name('admin.register');
    Route::get('/register', 'Auth\AdminRegisterController@showRegistrationForm')->name('admin.register');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    //logout-route
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');	
    //passwordReset-routes
    Route::post('/password/eamil', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

});

