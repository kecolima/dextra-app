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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| Web Routes Lanches
|--------------------------------------------------------------------------
*/
Route::get('/lanche/novo',  [App\Http\Controllers\LancheController::class, 'create']);
Route::post('/lanche/novo',  [App\Http\Controllers\LancheController::class, 'store'])->name('salvar_lanche');
Route::get('/lanche/ver',  [App\Http\Controllers\LancheController::class, 'show'])->name('ver_lanche');
Route::get('/lanche/deletar/{id}',  [App\Http\Controllers\LancheController::class, 'destroy'])->name('excluir_lanche');
Route::get('/lanche/editar/{id}',  [App\Http\Controllers\LancheController::class, 'edit'])->name('editar_lanche');
Route::post('/lanche/editar/{id}',  [App\Http\Controllers\LancheController::class, 'update'])->name('atualizar_lanche');

/*
|--------------------------------------------------------------------------
| Web Routes Vendas
|--------------------------------------------------------------------------
*/
Route::get('/venda/novo',  [App\Http\Controllers\VendaController::class, 'create']);
Route::post('/venda/novo',  [App\Http\Controllers\VendaController::class, 'store'])->name('salvar_venda');
Route::get('/venda/ver',  [App\Http\Controllers\VendaController::class, 'show'])->name('ver_venda');
Route::get('/venda/deletar/{id}',  [App\Http\Controllers\VendaController::class, 'destroy'])->name('excluir_venda');
Route::get('/venda/editar/{id}',  [App\Http\Controllers\VendaController::class, 'edit'])->name('editar_venda');
Route::post('/venda/editar/{id}',  [App\Http\Controllers\VendaController::class, 'update'])->name('atualizar_venda');



