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

/*
|--------------------------------------------------------------------------
| Web Routes Promocoes
|--------------------------------------------------------------------------
*/
Route::get('/promocao/novo',  [App\Http\Controllers\PromocaoController::class, 'create']);
Route::post('/promocao/novo',  [App\Http\Controllers\PromocaoController::class, 'store'])->name('salvar_promocao');
Route::get('/promocao/ver',  [App\Http\Controllers\PromocaoController::class, 'show'])->name('ver_promocao');
Route::get('/promocao/deletar/{id}',  [App\Http\Controllers\PromocaoController::class, 'destroy'])->name('excluir_promocao');
Route::get('/promocao/editar/{id}',  [App\Http\Controllers\PromocaoController::class, 'edit'])->name('editar_promocao');
Route::post('/promocao/editar/{id}',  [App\Http\Controllers\PromocaoController::class, 'update'])->name('atualizar_promocao');

/*
|--------------------------------------------------------------------------
| Web Routes Ingredientes
|--------------------------------------------------------------------------
*/
Route::get('/ingrediente/novo',  [App\Http\Controllers\IngredienteController::class, 'create']);
Route::post('/ingrediente/novo',  [App\Http\Controllers\IngredienteController::class, 'store'])->name('salvar_ingrediente');
Route::get('/ingrediente/ver',  [App\Http\Controllers\IngredienteController::class, 'show'])->name('ver_ingrediente');
Route::get('/ingrediente/deletar/{id}',  [App\Http\Controllers\IngredienteController::class, 'destroy'])->name('excluir_ingrediente');
Route::get('/ingrediente/editar/{id}',  [App\Http\Controllers\IngredienteController::class, 'edit'])->name('editar_ingrediente');
Route::post('/ingrediente/editar/{id}',  [App\Http\Controllers\IngredienteController::class, 'update'])->name('atualizar_ingrediente');



