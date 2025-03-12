<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CinemaController;
use App\Http\Controllers\FilmeController;
use App\Http\Controllers\SalasController;
use App\Http\Controllers\SessoesController;

Route::get('/', [CinemaController::class, 'index']);

//Rota filmes
Route::get('/criar/index', [FilmeController::class, 'index'])->name('criar.index');
Route::get('/criar/filmes', [FilmeController::class, 'create'])->name('criar.create');
Route::post('/criar/store', [FilmeController::class, 'store'])->name('criar.store');
Route::get('/criar/{id}/edit', [FilmeController::class, 'edit'])->name('criar.edit');
Route::delete('/criar/destroy/{id}', [FilmeController::class, 'destroy'])->name('criar.destroy');

//Rota salas
Route::get('/salas/index', [SalasController::class, 'index'])->name('salas.index');
Route::get('/criar/salas', [SalasController::class, 'create'])->name('criar.create');
Route::post('/salas/store', [SalasController::class, 'store'])->name('salas.store');
Route::get('/salas/{id}/edit', [SalasController::class, 'edit'])->name('criar.edit');
Route::delete('/salas/destroy/{id}', [SalasController::class, 'destroy'])->name('salas.destroy');

//Rota sessões
Route::get('/criar/sessoes', [SessoesController::class, 'create']);
Route::post('/sessoes', [SessoesController::class, 'store']);



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
