<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuariosController;

Route::get('/',[HomeController::class, 'home']);

Route::get('usuarios', [UsuariosController::class, 'index'])->name('usuarios.index');

Route::get('usuarios/create', [UsuariosController::class, 'create'])->name('usuarios.create');

Route::post('usuarios', [UsuariosController::class, 'store'])->name('usuarios.store');

Route::delete('usuarios/{usuario}', [UsuariosController::class, 'delete'])->name('usuarios.delete');

Route::get('usuarios/{usuario}/edit', [UsuariosController::class, 'edit'])->name('usuarios.edit');

Route::put('usuarios/{usuario}', [UsuariosController::class, 'update'])->name('usuarios.update');