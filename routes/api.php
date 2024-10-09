<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\GenerateCodeController;
use App\Http\Controllers\Auth\ValidateCodeController;
use App\Http\Controllers\User\UpdateUserController;
use App\Http\Controllers\User\VerifyUserPasscodeController;
use Illuminate\Support\Facades\Route;
use Jericdei\PsgcDatabase\Models\Barangay;
use Jericdei\PsgcDatabase\Models\City;
use Jericdei\PsgcDatabase\Models\Municipality;
use Jericdei\PsgcDatabase\Models\Province;
use Jericdei\PsgcDatabase\Models\Region;
use Jericdei\PsgcDatabase\Models\SubMunicipality;

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

        Route::post('{user}/passcode/verify', VerifyUserPasscodeController::class)->name('passcode.verify');
    });
});

Route::prefix('psgc')->as('psgc.')->group(function () {
    Route::get('regions', fn() => response()->json([
        'regions' => Region::all(['region_code', 'name']),
    ]))->name('regions');

    Route::get('provinces', fn(Request $request) => response()->json([
        'provinces' => Province::query()
            ->where('region_code', $request->input('region_code'))
            ->get(['province_code', 'name']),
    ]));

    Route::get('municipalities', fn(Request $request) => response()->json([
        'municipalities' => Municipality::query()
            ->where('province_code', $request->input('province_code'))
            ->get(['municipality_code', 'name']),
    ]));

    Route::get('cities', fn(Request $request) => response()->json([
        'cities' => City::query()
            ->where('region_code', $request->input('region_code'))
            ->get(['city_code', 'name']),
    ]));

    Route::get('cities_and_municipalities', fn(Request $request) => response()->json([
        'cities_and_municipalities' => Province::query()
            ->where('province_code', $request->input('province_code'))
            ->first()
            ?->getCitiesAndMunicipalities() ?? [],
    ]));

    Route::get('sub_municipalities', fn() => response()->json([
        'sub_municipalities' => SubMunicipality::all(['municipality_code', 'name']),
    ]));

    Route::get('barangays', fn(Request $request) => response()->json([
        'barangays' => Barangay::query()
            ->where('municipality_code', $request->input('municipality_code'))
            ->orWhere('province_code', $request->input('province_code'))
            ->get(['barangay_code', 'name']),
    ]));
});
