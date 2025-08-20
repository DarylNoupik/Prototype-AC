<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\{DataController,ProjectController, CultureController, AlertController, SiteController, TeamController,UserController};
// use App\Models\User;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     $user = User::where('email', 'test@test.gmail')->first();
//     return view("profile.partials.update-profile-information-form",compact('user')); 
// });

Route::get('/', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    
    //Route::setRole('/setRole', [UserController::class, 'setRole'])->name('user.setRole');


    Route::get('/dashboard', [AppController::class, 'dashboard'])->name('dashboard');

    Route::apiResource('projects', ProjectController::class);
    Route::apiResource('cultures', CultureController::class);
    Route::apiResource('alerts', AlertController::class);
    Route::apiResource('sites', SiteController::class);
    Route::apiResource('teams', TeamController::class);
    Route::apiResource('users', UserController::class);
    Route::apiResource('sensor_data', DataController::class);

    Route::post('projects/{project}/attach-culture',[ProjectController::class, 'attachCulture'])->name('projects.attachCulture');
    route::delete('/detach-culture/{culture}',[ProjectController::class,'detachCulture'])->name('projects.detachCulture');

        // Routes pour les données des capteurs
    Route::get('/sensor-data/culture/{cultureId}', [SensorDataController::class, 'getByCulture'])->name('sensor-data.getByCulture');
    Route::get('/sensor-data/latest/{cultureId}', [SensorDataController::class, 'getLatest'])->name('sensor-data.getLatest');
    Route::get('/projets/latest-data', [ProjectController::class, 'latestData']);


});

Route::get('/search/{query}', [ProjectController::class, 'search']);

require __DIR__.'/auth.php';
