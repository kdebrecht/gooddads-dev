<?php

use Illuminate\Support\Facades\Route;

Route::prefix('intake')
    ->name('intake.')
    ->controller(\App\Http\Controllers\IntakeFormController::class)
    ->group(function () {
        Route::get('/', 'start')->name('start');
        Route::post('/', 'startStore')->name('start.store');
        Route::get('/contact', 'contact')->name('contact');
        Route::post('/contact', 'contactStore')->name('contact.store');
    });
