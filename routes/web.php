<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\Home;
use App\Http\Controllers\Produto;
use App\Http\Controllers\User;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [Home::class, 'Home']);


Route::get('admins', [Admin::class, 'admins']);
Route::get('cadastroProduto', [Admin::class, 'cadastropg']);
Route::get('pesquisa', [Admin::class, 'pesquisa']);

Route::post('adicionarProduto', [Produto::class, 'adicionarProduto'])->name('produto.adicionar');
Route::get('excluirProduto/{id}', [Produto::class, 'excluirProduto'])->name('produto.excluir');
Route::get('alterarProduto/{id}', [Produto::class, 'alterarProduto'])->name('produto.alterar');
Route::post('atualizarProduto/{id}', [Produto::class, 'atualizarProduto'])->name('produto.atualizar');


Route::get('carrinho', [User::class, 'carrinho']);
Route::get('deslogar', [User::class, 'deslogar'])->name('usuario.deslogar');
Route::get('logar', [User::class, 'logar'])->name('usuario.logar');







Route::get('/dashboard', [Home::class, 'Home'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
