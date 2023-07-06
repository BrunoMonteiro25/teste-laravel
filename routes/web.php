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

Route::delete('/usuarios/{id}', [UsuariosController::class, 'destroy'])->name(
    'usuarios.destroy'
);

Route::get('/usuarios/{id}/edit', [UsuariosController::class, 'edit'])->name(
    'usuarios.edit'
);

Route::put('/usuarios/{id}', [UsuariosController::class, 'update'])->name(
    'usuarios.update'
);
