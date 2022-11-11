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

Route::get('/', 'IndexController@index');
Route::get('/api/free_cars', 'IndexController@free_cars');
Route::get('/api/link', 'IndexController@link');
Route::get('/api/clear', 'IndexController@clear');
Route::get('/api/clear/{id}', 'IndexController@clear');
