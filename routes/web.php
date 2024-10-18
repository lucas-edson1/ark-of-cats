<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GatoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CadastroController;

Route::get('/', function () {return view('app.home');})->name('app.home');
Route::get('/search', [GatoController::class, 'search'])->name('search.breed');
Route::post('/favoritar', [GatoController::class, 'favoritar'])->name('favoritar.cat');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'loginCreate'])->name('login.form');
    Route::post('/login', [LoginController::class, 'auth'])->name('login.auth');
    Route::get('/cadastro', [CadastroController::class, 'cadastroCreate'])->name('cadastro.form');
    Route::post('/cadastro', [CadastroController::class, 'cadastrar'])->name('cadastro.save');
});

Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');
Route::get('/perfil', [UserController::class, 'perfil'])->name('user.perfil');
Route::get('/perfil/favorites', [UserController::class, 'getFavorites'])->name('user.favorites');
Route::delete('/perfil/favorites/remover/{id}', [UserController::class, 'removeFavorite'])->name('user.removefavorite');
Route::patch('/perfil/atualizar', [UserController::class, 'atualizar'])->name('user.atualizar');