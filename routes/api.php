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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['cors']], function () {
    // Routes to which access will be allowed.
    Route::get('/paraguayans','Paraguayans@getParaguayans')->name('getParaguayos');
    Route::get('/remotemode','Stats@getCountRemoteMode')->name('getCountRemoteMode');
    Route::get('/presentialmode','Stats@getCountPresentialMode')->name('getCountPresentialMode');
    Route::get('/presentialremotemode','Stats@getCountPresentialRemoteMode')->name('getCountPresentialRemoteMode');
});