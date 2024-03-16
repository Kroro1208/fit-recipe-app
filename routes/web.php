<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [RecipeController::class, 'home'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('recipes/create', [RecipeController::class, 'create'])->name('recipes.create');
    Route::post('recipes', [RecipeController::class, 'store'])->name('recipes.store');
    Route::get('recipes/{recipe}/edit', [RecipeController::class, 'edit'])->name('recipes.edit');
    Route::PATCH('recipes/{recipe}', [RecipeController::class, 'update'])->name('recipes.update');
    Route::delete('recipes/{recipe}', [RecipeController::class, 'destroy'])->name('recipes.destroy');

});

Route::resource('recipes', RecipeController::class)->except(['create', 'store', 'edit', 'destroy']);

require __DIR__.'/auth.php';
