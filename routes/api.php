<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VagaController;

Route::apiResource('empresas', EmpresaController::class);
Route::apiResource('usuarios', UsuarioController::class);
Route::apiResource('vagas', VagaController::class);

Route::post('vagas/{vaga}/candidatar', [VagaController::class, 'candidatar']);
Route::get('usuarios/{usuario}/vagas', [UsuarioController::class, 'vagas']);
