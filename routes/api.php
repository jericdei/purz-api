<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\GenerateCodeController;
use App\Http\Controllers\Auth\ValidateCodeController;
use App\Http\Controllers\User\UpdateUserController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->as('auth.')->group(function () {
    Route::post('/code/generate', GenerateCodeController::class)
        ->middleware('guest')
        ->name('code.generate');

    Route::post('/code/validate', ValidateCodeController::class)
        ->middleware('guest')
        ->name('code.validate');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware('guest');

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
            ->name('logout');

        Route::get('/user', function (Request $request) {
            return $request->user()->load('profile');
        })->name('user');
    });
});

Route::prefix('users')->as('user.')->group(function () {
    Route::middleware('auth:sanctum')->group(function () {
        Route::patch('{user}', UpdateUserController::class)
            ->name('update');
    });
});
