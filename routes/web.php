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

Route::get('api-doc', function() {
  return view('apiDoc.index');
})->name('api.doc');

// Login - Logout ADMIN
Route::get('admin-login', 'backend\LoginController@login')->name('user.login');
Route::post('admin-auth/login', 'backend\LoginController@doLogin')->name('user.auth.login');
Route::get('admin-logout', 'backend\LoginController@doLogout')->name('user.logout');

//Dashboard
Route::group(['middleware'=>'auth'], function() {
  Route::get('dashboard-admin', 'backend\LoginController@dashboardAdmin')->name('dashboard.admin');
});

//Pengelolaan Kost
Route::group(['middleware'=>'auth'], function() {
  Route::get('kost-index', 'backend\KostController@index')->name('back.kost.index');
  Route::get('kost-create', 'backend\KostController@create')->name('back.kost.create');
  Route::post('kost-store', 'backend\KostController@store')->name('back.kost.store');
  Route::get('kost-edit/{id}', 'backend\KostController@edit')->name('back.kost.edit');
  Route::patch('kost-update/{id}', 'backend\KostController@update')->name('back.kost.update');
  Route::get('kost-delete/{id}', 'backend\KostController@destroy')->name('back.kost.destroy');
});


//Pengelolaan Pemilik
Route::group(['middleware'=>'auth'], function() {
  Route::get('pemilik-index', 'backend\PemilikController@index')->name('back.pemilik.index');
  Route::get('pemilik-create', 'backend\PemilikController@create')->name('back.pemilik.create');
  Route::post('pemilik-store', 'backend\PemilikController@store')->name('back.pemilik.store');
  Route::get('pemilik-edit/{id}', 'backend\PemilikController@edit')->name('back.pemilik.edit');
  Route::patch('pemilik-update/{id}', 'backend\PemilikController@update')->name('back.pemilik.update');
  Route::get('pemilik-delete/{id}', 'backend\PemilikController@destroy')->name('back.pemilik.destroy');
});
