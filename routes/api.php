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

Route::post('/adress/create', 'AdressController@store');
Route::get('/adress/edit/{id}', 'AdressController@edit');
Route::post('/adress/update/{id}', 'AdressController@update');
Route::delete('/adress/delete/{id}', 'AdressController@delete');
Route::get('/adress', 'AdressController@index');