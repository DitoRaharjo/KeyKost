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
Route::get('admin-login', 'Backend\LoginController@login')->name('user.login');
Route::post('admin-auth/login', 'Backend\LoginController@doLogin')->name('user.auth.login');
Route::get('admin-logout', 'Backend\LoginController@doLogout')->name('user.logout');

//Dashboard
Route::group(['middleware'=>'auth'], function() {
  Route::get('dashboard-admin', 'Backend\LoginController@dashboardAdmin')->name('dashboard.admin');
});

//Pengelolaan Kost
Route::group(['middleware'=>'auth'], function() {
  Route::get('kost-index', 'Backend\KostController@index')->name('back.kost.index');
  Route::get('kost-create', 'Backend\KostController@create')->name('back.kost.create');
  Route::post('kost-store', 'Backend\KostController@store')->name('back.kost.store');
  Route::get('kost-edit/{id}', 'Backend\KostController@edit')->name('back.kost.edit');
  Route::patch('kost-update/{id}', 'Backend\KostController@update')->name('back.kost.update');
  Route::get('kost-delete/{id}', 'Backend\KostController@destroy')->name('back.kost.destroy');
});


//Pengelolaan Pemilik
Route::group(['middleware'=>'auth'], function() {
  Route::get('pemilik-index', 'Backend\PemilikController@index')->name('back.pemilik.index');
  Route::get('pemilik-create', 'Backend\PemilikController@create')->name('back.pemilik.create');
  Route::post('pemilik-store', 'Backend\PemilikController@store')->name('back.pemilik.store');
  Route::get('pemilik-edit/{id}', 'Backend\PemilikController@edit')->name('back.pemilik.edit');
  Route::patch('pemilik-update/{id}', 'Backend\PemilikController@update')->name('back.pemilik.update');
  Route::get('pemilik-delete/{id}', 'Backend\PemilikController@destroy')->name('back.pemilik.destroy');
});
