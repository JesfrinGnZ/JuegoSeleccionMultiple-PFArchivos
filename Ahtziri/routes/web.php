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

//inicio
Route::get('/', function () {
    return view('welcome');
});

//para el login
Route::post('login', 'Auth\LoginController@login')->name('login');

Auth::routes();

//home de cuestionarios
Route::get('/home', 'HomeController@index')->name('home');

//Para crear cuestionario,aun no valida el LogIn
Route::get('creacionCuestionario',function(){
  return view('cuestionarios.creacionCuestionario');
})->name('creacionCuestionario');

//creacion de cuestionarios
Route::post('/', 'CuestionController@create')->name('cuestion.crear');
