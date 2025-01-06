<?php

use App\Http\Controllers\Intake\IntakeController;
use App\Http\Controllers\Intake\ParticipantIntakeCodeController;
use App\Http\Controllers\Intake\SignupController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\IntakeUserIdentifierMiddleware;
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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::name('intake.')
    ->middleware([IntakeUserIdentifierMiddleware::class])
    ->prefix('intake')->group(function () {
        Route::prefix('code/{participant}')
            ->name('code.')
            ->middleware(['auth', 'verified'])
            ->withoutMiddleware(IntakeUserIdentifierMiddleware::class)
            ->controller(ParticipantIntakeCodeController::class)->group(function () {
                Route::get('/', 'show')->name('show');
                Route::post('/', 'store')->name('generate');
                Route::delete('/', 'destroy')->name('destroy');
            });

        Route::withoutMiddleware(IntakeUserIdentifierMiddleware::class)
            ->controller(IntakeController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/', 'store')->name('start');
            });

        Route::resource('signup', SignupController::class)
            ->only(['index', 'store', 'show', 'edit', 'update']);
    });

require __DIR__.'/auth.php';
