<?php

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware('auth:sanctum')->prefix('categories')->group(function () {
    Route::get('/', [CategoriasController::class, 'categories'])->name('categories');
    Route::post('/agregar-categories', [CategoriasController::class, 'addCategories'])->name('addCategories');
    Route::put('/actualizar-categories/{id}', [CategoriasController::class, 'updateCategories'])->name('updateCategories');
    Route::delete('/eliminar-categories/{id}', [CategoriasController::class, 'deleteCategories']);
});
