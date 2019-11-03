<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::post('login', 'Auth\LoginController@login')->name('login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
