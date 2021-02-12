<?php

use Illuminate\Support\Facades\Route;

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

//Route::resource('almacen/categorias', 'CategoriaController');
Route::get('/almacen/categorias', 'CategoriaController@index')->name('categorias.index');
Route::get('/almacen/categorias/create', 'CategoriaController@create')->name('categorias.create');
Route::post('/almacen/categorias/', 'CategoriaController@store')->name('categorias.store');
Route::get('/almacen/categorias/{categoria}', 'CategoriaController@show')->name('categorias.show');
Route::get('/almacen/categorias/{categoria}/edit', 'CategoriaController@edit')->name('categorias.edit');
Route::put('/almacen/categorias/{categoria}', 'CategoriaController@update')->name('categorias.update');
Route::delete('/almacen/categorias/{categoria}', 'CategoriaController@destroy')->name('categorias.destroy');

//Route::resource('almacen/articulos', 'ArticuloController');
Route::get('/almacen/articulos', 'ArticuloController@index')->name('articulos.index');
Route::get('/almacen/articulos/create', 'ArticuloController@create')->name('articulos.create');
Route::post('/almacen/articulos/', 'ArticuloController@store')->name('articulos.store');
Route::get('/almacen/articulos/{articulo}', 'ArticuloController@show')->name('articulos.show');
Route::get('/almacen/articulos/{articulo}/edit', 'ArticuloController@edit')->name('articulos.edit');
Route::put('/almacen/articulos/{articulo}', 'ArticuloController@update')->name('articulos.update');
Route::delete('/almacen/articulos/{articulo}', 'ArticuloController@destroy')->name('articulos.destroy');

//Route::resource('venta/clientes', 'ClienteController');
Route::get('/venta/clientes', 'ClienteController@index')->name('clientes.index');
Route::get('/venta/clientes/create', 'ClienteController@create')->name('clientes.create');
Route::post('/venta/clientes/', 'ClienteController@store')->name('clientes.store');
Route::get('/venta/clientes/{persona}', 'ClienteController@show')->name('clientes.show');
Route::get('/venta/clientes/{persona}/edit', 'ClienteController@edit')->name('clientes.edit');
Route::put('/venta/clientes/{persona}', 'ClienteController@update')->name('clientes.update');
Route::delete('/venta/clientes/{persona}', 'ClienteController@destroy')->name('clientes.destroy');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
