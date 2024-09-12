<?php

namespace App\Http\Controllers\City;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class ReadCityController extends Controller
{
    public function index()
    {
        $fetchedCities = City::all();
        return $fetchedCities->isEmpty()
        ? response()->json([
            'message' => 'There are no registered cities!',
            'status' => 400], 200)
        : response()->json($fetchedCities, 200);
    }
}
