<?php

use App\Http\Controllers\Country\CreateCountryController;
use App\Http\Controllers\Country\ReadCountryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/show-countries', [ReadCountryController::class, 'index']);
Route::post('/create-country', [CreateCountryController::class, 'store']);