<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix'=>env('API_VERSION')], function() {
  Route::get('test', 'API\TestController@urlQuery')->name('api.urlQuery');
  Route::post('test', 'API\TestController@postTest')->name('api.post');
  Route::put('test', 'API\TestController@putTest')->name('api.put');
  Route::patch('test', 'API\TestController@patchTest')->name('api.patch');
  Route::delete('test', 'API\TestController@deleteTest')->name('api.delete');
});

//Door Logging
Route::group(['prefix'=>env('API_VERSION')], function() {
  Route::get('log', 'API\DoorController@log')->name('door.log');
});

//User Authentication
Route::group(['prefix'=>env('API_VERSION')], function() {
  Route::post('auth', 'API\AuthController@auth')->name('user.auth');
});

//Penyewa Management
Route::group(['prefix'=>env('API_VERSION')], function() {
  Route::get('penyewa', 'API\UserController@getAllPenyewa')->name('penyewa.getAll');
  Route::get('penyewa/{id}', 'API\UserController@getOnePenyewa')->name('penyewa.getOne');

  Route::get('log-penyewa/{id}', 'API\UserController@getLogPenyewa')->name('penyewa.log');

  Route::post('penyewa', 'API\UserController@registerPenyewa')->name('penyewa.store');
  Route::patch('penyewa', 'API\UserController@updatePenyewa')->name('penyewa.update');
  Route::delete('penyewa/{id}', 'API\UserController@deletePenyewa')->name('penyewa.delete');
});

//Kost Management
Route::group(['prefix'=>env('API_VERSION')], function() {
  Route::get('log-kost/{id}', 'API\KostController@getLogKost')->name('kost.log');
});
