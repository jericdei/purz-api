<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\GenerateCodeController;
use App\Http\Controllers\Auth\ValidateCodeController;
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

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->middleware('auth')
        ->name('logout');
});

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
