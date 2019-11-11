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
//ruta de inicio
Route::get('/', 'PagesController@inicio'); //ahora el Controller retorna la vista inicio asi como las demas

//ruta cuestionarios
Route::get('cuestionarios', 'PagesController@cuestionarios');
//ruta administradores
Route::get('administradores', 'PagesController@admins');
//ruta jugadores
Route::get('jugadores', 'PagesController@jugadores');
//ruta jugadores
Route::get('otros', 'PagesController@otros');

Route::post('/', 'PagesController@crear')->name('admins.crear');


//admins
Route::resource('admins', 'AdminController');
