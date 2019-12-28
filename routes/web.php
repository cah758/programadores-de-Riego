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
Route::get('profile', ['middleware' => 'auth.basic', function()
{

}]);



Route::resource('/', 'ClienteController');
Route::get('generarClientes', 'ClienteController@pdf')->name('clientes.pdf');
Route::get('/exportarClientes', 'ClienteController@export')->name('clientes.export');


Route::resource('programadores', 'ProgramadorController');
Route::get('generarProgramadores', 'ProgramadorController@pdf')->name('programadores.pdf');
Route::get('/exportarProgramadores', 'ProgramadorController@export')->name('programadores.export');



Route::resource('sensores', 'SensorController');
Route::get('generarSensores', 'SensorController@pdf')->name('sensores.pdf');
Route::get('/exportarSensores', 'SensorController@export')->name('sensores.export');



Auth::routes();
