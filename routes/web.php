<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\{ProjectController, CultureController, AlertController, SiteController, TeamController};
use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return view("projets.projet"); 
});

Route::get('/', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/dashboard', [AppController::class, 'dashboard'])->name('dashboard');

    Route::apiResource('projects', ProjectController::class);
    Route::apiResource('cultures', CultureController::class);
    Route::apiResource('alerts', AlertController::class);
    Route::apiResource('sites', SiteController::class);
    Route::apiResource('teams', TeamController::class);
});

require __DIR__.'/auth.php';
