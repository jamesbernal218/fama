<?php

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/medicinas', function () {
    return Inertia::render('Medicinas');
})->name('medicinas');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['prefix' => 'categories', 'middleware' => 'auth'], function () {
    Route::get('/categories', [CategoriasController::class, 'categories'])->name('categories');
    Route::get('/agregar-categories', [CategoriasController::class, 'addCategories']);
    Route::post('/agregar-categories', [CategoriasController::class, 'addCategories'])->name('addCategories');
    Route::get('/actualizar-categories/{id}', [CategoriasController::class, 'updateCategories']);
    Route::put('/actualizar-categories/{id}', [CategoriasController::class, 'updateCategories'])->name('updateCategories');
    Route::delete('/eliminar-categories/{id}', [CategoriasController::class, 'deleteCategories']);
});

Route::group(['prefix' => 'medicine', 'middleware' => 'auth'], function () {
    Route::get('/medicine', [MedicineController::class, 'medicine'])->name('medicine');
    Route::get('/add-medicine', [MedicineController::class, 'addMedicine'])->name('addMedicine');
    Route::post('/add-medicine', [MedicineController::class, 'addMedicine'])->name('PostAddMedicine');
    Route::get('/edit/{id}', [MedicineController::class, 'edit'])->name('medicines.edit');
    Route::put('/edit/{id}', [MedicineController::class, 'edit'])->name('editMedicine');
    Route::get('/delete/{id}', [MedicineController::class, 'destroy'])->name('medicines.destroy');
});

require __DIR__ . '/auth.php';
