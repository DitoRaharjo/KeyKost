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

Route::group(['prefix'=>env('API_VERSION')], function() {
  Route::get('log', 'API\DoorController@log')->name('door.log');
});
