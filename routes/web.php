<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Auth;
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

// Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');
    Route::resource('crimes', 'CrimeController');
});

Route::get('/ucrime/{id}', 'CrimeController@indexUser');
Route::get('/crimes/filter/{jenis}', 'CrimeController@filter');
Route::get('/users/filter/{jenis}', 'UserController@filter');

Route::post('image-upload', 'CrimeController@imageUploadPost')->name('image.upload.post');
Route::get('/user/export_excel', 'UserController@export_excel');
Route::post('/user/import_excel', 'UserController@import_excel');
Route::get('/crime/export_excel', 'CrimeController@export_excel');
Route::post('/crime/import_excel', 'CrimeController@import_excel');


Auth::routes();
Route::get('crimes/{id}', 'CrimeController@destroy');
Route::delete('crimesDeleteAll', 'CrimeController@deleteAll');

Route::get('myporducts', 'ProductController@index');
Route::get('myporducts/{id}', 'ProductController@destroy');
Route::delete('myporductsDeleteAll', 'ProductController@deleteAll');

Route::get('ajaxdata', 'AjaxdataController@index')->name('ajaxdata');
Route::get('ajaxdata/getdata', 'AjaxdataController@getdata')->name('ajaxdata.getdata');

Route::post('ajaxdata/postdata', 'AjaxdataController@postdata')->name('ajaxdata.postdata');

Route::get('ajaxdata/fetchdata', 'AjaxdataController@fetchdata')->name('ajaxdata.fetchdata');
Route::get('ajaxdata/removedata', 'AjaxdataController@removedata')->name('ajaxdata.removedata');
