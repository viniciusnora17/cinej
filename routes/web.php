<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CinemaController;
use App\Http\Controllers\FilmeController;
use App\Http\Controllers\SalasController;
use App\Http\Controllers\SessoesController;

Route::get('/', [CinemaController::class, 'index']);

//Rota filmes
Route::get('/criar/filmes', [FilmeController::class, 'create']);
Route::post('/criar/store', [FilmeController::class, 'store'])->name('criar.store');

//Rota salas
Route::get('/criar/salas', [SalasController::class, 'create']);
Route::post('/salas', [SalasController::class, 'store']);

//Rota sessões
Route::get('/criar/sessoes', [SessoesController::class, 'create']);
Route::post('/sessoes', [SessoesController::class, 'store']);


