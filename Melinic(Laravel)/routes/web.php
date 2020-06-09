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

Route::get('/', function () {
    return view('welcome');
})->name('main');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');
Route::get('/home/usr/{name?}/pswd-{url_token}', 'UserController@showPasswordUpdateForm')->name('user.password.update');
Route::get('/home/usr/{name?}/adrs-{url_token}', 'UserController@showAddressUpdateForm')->name('user.address.update');
Route::post('/update', 'UserController@UpdatePassword')->name('user.password.submit');
Route::post('/update/adr/ins', 'UserController@InsertAddress')->name('user.insaddress.submit');
Route::post('/update/adr/up', 'UserController@UpdateAddress')->name('user.upaddress.submit');
Route::post('/doctor/register', 'Auth\AdminRegisterController@register')->name('doctor.register'); // is not secure!!!
Route::get('/doctor/register', 'Auth\AdminRegisterController@showRegistrationForm')->name('doctor.register');
Route::get('/patient/register', 'UserController@ShowRegisterPatientForm')->name('patient.new.add');
Route::get('/patient/history', 'UserController@ShowPatientHistory')->name('patient.history');
Route::post('/patient/register', 'UserController@RegisterPatient')->name('patient.new.submit');
Route::get('/patient/visit', 'UserController@ShowSetupVisitPatientForm')->name('patient.new.visit');
Route::post('/patient/visit', 'UserController@InsertVisitPatient')->name('patient.new.visit.add');
Route::get('/patient/search', 'UserController@ShowSearchPatientForm')->name('patient.search.show');
Route::post('/patients/search', 'UserController@SearchPatientResult')->name('patient.search.result');
Route::get('/doctor/info', 'UserController@ShowDoctorInfoForm')->name('doctor.info');
Route::get('/doctor/info/presence', 'UserController@ShowDoctorPresenceTable')->name('doctor.info.presence');
Route::delete('/doctor/info/{id}', 'UserController@DelDoctorInfo')->name('doctor.info.del');
Route::get('/insured/info', 'UserController@ShowInsuredInfoForm')->name('insured.settings');
Route::post('/insured/info', 'UserController@SubmitInsuredInfo')->name('insured.settings.submit');


Route::prefix('admin')->group(function(){
	Route::get('/login', 'Auth\AdminLoginController@ShowLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    //AdminPasswordUpdate-routes
    Route::get('/usr/{name?}/pswd-{url_token}/doc', 'AdminController@showPasswordUpdateForm')->name('admin.password.update');
    Route::get('/usr/{name?}/pswd-{url_token}', 'AdminController@showAddressUpdateForm')->name('admin.address.update');
    Route::post('/update', 'AdminController@UpdatePassword')->name('admin.password.submit');
    Route::post('/update/adr/ins', 'AdminController@InsertAddress')->name('admin.insaddress.submit');
    Route::post('/update/adr/up', 'AdminController@UpdateAddress')->name('admin.upaddress.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    //logout-route
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');	
    //passwordReset-routes
    Route::post('/password/eamil', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::get('/patient/visit/now', 'AdminController@ShowNowPatient')->name('doc.pastient.now');
    Route::post('/patient/des-sess', 'AdminController@DesPatientSession')->name('pastient.des.sess');
    Route::post('/patient/prescription', 'AdminController@SavePatientPrescription')->name('pastient.now.submit.prescription');

});
