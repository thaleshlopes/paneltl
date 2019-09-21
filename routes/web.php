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

#Route::get('/', function () {
#    return view('index');
#});

Route::get('/', 'ControladorAdmin@index');


Route::get('/tarifador', 'ControladorTarifador@index');
Route::any('/tarifador-search', 'ControladorTarifador@store')->name('tarifador.store');

Route::get('/gravador', 'ControladorGravador@index');
Route::any('/gravador-search', 'ControladorGravador@store')->name('gravador.store');

Route::get('/perfil', 'ControladorPerfil@index');
Route::post('/perfil', 'ControladorPerfil@update_avatar');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('login', '\App\Http\Controllers\Auth\LoginController@login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminController@index')->name('admin.dashboard');

Route::get('/admin/login', 'Auth\AdminLoginController@index')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

Route::get('/usuarios ', 'ControladorUsuario@index');
Route::post('/usuarios ', 'ControladorUsuario@store');
Route::get('/usuarios/novo ', 'ControladorUsuario@create');
Route::get('/usuarios/editar/{id} ', 'ControladorUsuario@edit');
Route::post('/usuarios/{id} ', 'ControladorUsuario@update');
Route::get('/usuarios/apagar/{id} ', 'ControladorUsuario@destroy');

Route::get('/404', 'Controlador404@index');

Route::get('/mesa', 'ControladorMesa@index');