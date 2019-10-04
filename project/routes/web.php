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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// dashboard routs
Route::get('/dashboard/systemadmin', 'SystemAdminController@index');
Route::get('/dashboard/admin', 'AdminController@index');
Route::get('/dashboard/manager', 'ManagerController@index');
Route::get('/dashboard/customer', 'CustomerController@index');
