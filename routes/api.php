<?php

use App\Http\Controllers\City\CreateCityController;
use App\Http\Controllers\City\ReadCityController;
use App\Http\Controllers\Country\CreateCountryController;
use App\Http\Controllers\Country\ReadCountryController;
use App\Http\Controllers\Departament\CreateDepartamentController;
use App\Http\Controllers\Departament\ReadDepartamentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// The actions performed are Create and list data from the country table
Route::get('/show-countries', [ReadCountryController::class, 'index']);
Route::post('/create-country', [CreateCountryController::class, 'store']);

// The actions performed are Create and list data from the department table
Route::get('/show-departaments', [ReadDepartamentController::class, 'index']);
Route::post('/create-departament', [CreateDepartamentController::class, 'store']);

// The actions performed are Create and list data from the city table
Route::get('/cities', [ReadCityController::class, 'index']);
Route::post('/create-city', [CreateCityController::class, 'store']);

