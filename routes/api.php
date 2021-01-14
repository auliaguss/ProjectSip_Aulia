<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::get('user', 'UserController@index');
Route::get('/role/{id}', 'UserController@cekRole');
Route::post('user', 'UserController@add');
Route::put('/user/{id}', 'UserController@edit');
Route::delete('/user/{id}', 'UserController@delete');
Route::get('/user/{jenis}/{id}', 'UserController@search');


Route::get('role', 'RoleController@index');
Route::post('role', 'RoleController@add');
Route::put('/role/{id}', 'RoleController@edit');
Route::delete('/role/{id}', 'RoleController@delete');
Route::get('/role/{jenis}/{id}', 'RoleController@search');
