<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\SpecialityController;
use App\Http\Controllers\DoctorTitleController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::controller(DoctorTitleController::class)->prefix('doctor_title')->group(function () {
    Route::get('/', 'index');
    Route::get('/{title}', 'show');
    Route::post('/', 'store');
    Route::put('/{title}', 'edit');
    Route::delete('/{title}', 'delete');
});


Route::controller(CountryController::class)->prefix('countries')->group(function () {
    Route::get('/', 'index');
    Route::get('/{country}', 'show');
    Route::post('/', 'store');
    Route::put('/{country}', 'edit');
    Route::delete('/{country}', 'destroy');
});



Route::controller(SpecialityController::class)->prefix('specialities')->group(function () {
    Route::get('/', 'index');
    Route::get('/{speciality}', 'show');
    Route::post('/', 'store');
    Route::put('/{speciality}', 'edit');
    Route::delete('/{speciality}', 'destroy');
});