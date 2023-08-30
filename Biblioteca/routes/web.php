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

Route::get('/', 'App\Http\Controllers\MainController@main')->name('site.main');
Route::get('/listaCliente', 'App\Http\Controllers\ClienteController@client')->name('site.listagemCliente');
Route::get('/catalogoDeLivro', 'App\Http\Controllers\LivroController@book')->name('site.catalogoLivro');

Route::get('/insereCliente', 'App\Http\Controllers\ClienteController@insertLine');
Route::delete('/excluirCliente/{id}', 'App\Http\Controllers\ClienteController@deleteLine');
Route::get('/editarCliente/{id}', 'App\Http\Controllers\ClienteController@editLine');
Route::get('/buscarCliente', 'App\Http\Controllers\ClienteController@findLine');

Route::get('/insereLivro', 'App\Http\Controllers\LivroController@insertLine');
Route::delete('/excluirLivro/{id}', 'App\Http\Controllers\LivroController@deleteLine');
Route::get('/editarLivro/{id}', 'App\Http\Controllers\LivroController@editLine');
Route::get('/buscarLivro', 'App\Http\Controllers\LivroController@findLine');
