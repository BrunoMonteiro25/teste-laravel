<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsuariosController;

Route::get('/', [UsuariosController::class, 'index'])->name('usuarios.index');

Route::get('/usuarios/create', [UsuariosController::class, 'create'])->name(
    'usuarios.create'
);

Route::post('/usuarios', [UsuariosController::class, 'store'])->name(
    'usuarios.store'
);
