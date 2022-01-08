<?php

use Illuminate\Support\Facades\Route;

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
Route::group(['middleware' =>[ 'auth','role-check']], function () {
	Route::get('/', 'HomeController@index');
	Route::get('/home', 'HomeController@index')->name('home');
	//Admin
	Route::resource('/admin','AdminController');
	Route::resource('/client','ClientController');
	Route::resource('/payment','PaymentController');
	Route::resource('/notice','NoticeController');
	Route::resource('/form','FormController');
	Route::get('/client_license/{id}','ClientController@clientLicense');
	Route::post('/client_license','ClientController@clientLicenseAdd');
	Route::get('/client_license_status/{id}','ClientController@clientLicenseStatus');

	Route::get('/change_password','ClientController@changePassword');
	Route::post('/change_password','ClientController@UpdatePassword');

	//Client
	Route::resource('/application','ApplicationController');
	Route::post('/application_print','ApplicationController@print');
	Route::get('/stored_application_print/{id}','ApplicationController@StoredAppPrint');
	Route::get('/application_translate/{slug}','ApplicationController@translate');


	Route::get('/pay_info', function(){ return view('pages.payment.pay_info'); });
	Route::get('/client_payment_report', 'PaymentController@payment_report');
	Route::get('/profile/view','ClientController@profile_view');
});

Auth::routes(['register'=>false]);

