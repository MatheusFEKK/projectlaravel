<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\Home;
use App\Http\Controllers\Produto;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [Home::class, 'Home']);


Route::get('admins', [Admin::class, 'admins']);
Route::get('cadastroProduto', [Admin::class, 'cadastropg']);
Route::get('pesquisa', [Admin::class, 'pesquisa']);

Route::post('adicionarProduto', [Produto::class, 'adicionarProduto'])->name('produto.adicionar');
Route::get('excluirProduto/{id}', [Produto::class, 'excluirProduto'])->name('produto.excluir');
Route::post('atualizarProduto/{id}', [Produto::class, 'atualizarProduto'])->name('produto.atualizar');












Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
