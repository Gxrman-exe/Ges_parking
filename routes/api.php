<?php

use App\Http\Controllers\City\CreateCityController;
use App\Http\Controllers\City\ReadCityController;
use App\Http\Controllers\Client\CreateClientController;
use App\Http\Controllers\Client\ReadClientController;
use App\Http\Controllers\Country\CreateCountryController;
use App\Http\Controllers\Country\ReadCountryController;
use App\Http\Controllers\Departament\CreateDepartamentController;
use App\Http\Controllers\Departament\ReadDepartamentController;
use App\Http\Controllers\Local\CreateLocalController;
use App\Http\Controllers\Local\DeleteLocalController;
use App\Http\Controllers\Local\ReadLocalController;
use App\Http\Controllers\Local\SpecificLocalController;
use App\Http\Controllers\Local\UpdateLocalController;
use App\Http\Controllers\Local\UpdatePartialLocalController;
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

// The actions performed are Create and list data from the local table
Route::get('/list-locals', [ReadLocalController::class, 'index']);
Route::post('/create-local', [CreateLocalController::class, 'store']);
Route::delete('/remove-locals/{id}', [DeleteLocalController::class, 'destroy']);
Route::put('/update-locals/{id}', [UpdateLocalController::class, 'update']);
Route::patch('/patch-update-locals/{id}', [UpdatePartialLocalController::class, 'patchUpdate']);
// Search for a specific location
Route::get('/search-locals/{id}', [SpecificLocalController::class, 'show']);

// The actions performed are Create and list data from the local table
Route::get('/list-clients', [ReadClientController::class, 'index']);
Route::post('/create-client', [CreateClientController::class, 'store']);