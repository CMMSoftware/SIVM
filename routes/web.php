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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('clientes','ClientesController');
Route::resource('usuarios','UsuariosController');
Route::resource('fornecedores','FornecedoresController');
Route::resource('produtos','ProdutosController');
Route::resource('vendas','VendasController');
