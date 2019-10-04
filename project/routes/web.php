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
});

// login routes
Auth::routes();

// dashboard routes
Route::get('/dashboard/systemadmin', 'SystemAdminController@index');
// Route::get('/dashboard/systemadmin/create-admin/', 'SystemAdminController@createAdmin');


Route::get('/dashboard/admin', 'AdminController@index');
Route::get('/dashboard/manager', 'ManagerController@index');

// customer routes
Route::get('/dashboard/customer', 'CustomerController@index');
Route::post('/dashboard/customer/update', 'CustomerController@update');
Route::get('/dashboard/customer/preview', 'CustomerController@preview');
Route::get('/dashboard/customer/file/delete', 'CustomerController@deleteFile');


// route for all admins
Route::get('/dashboard/systemadmin/create-admin/', 'CommonDataController@createAdmin')->middleware('systemadmin');
Route::post('/dashboard/systemadmin/create-admin/', 'CommonDataController@storeAdmin')->middleware('systemadmin');

Route::get('/dashboard/admin/create-manager/', 'CommonDataController@createManager')->middleware('admin');
Route::get('/dashboard/customer-list/', 'CommonDataController@customerList');
