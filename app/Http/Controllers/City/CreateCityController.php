<?php

namespace App\Http\Controllers\City;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\City;

class CreateCityController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        // If a single object is sent, we convert it to an array
        if (isset($data['departament_id']) && isset($data['city_name'])) {
            $data = [$data];
        }

        // Validation for handling both an array and a single object
        $validator = Validator::make($data, [
            '*.departament_id' => 'required|exists:departaments,id',
            '*.city_name' => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Error in data validation',
                'errors' => $validator->errors(),
                'status' => 400,
            ], 400);
        }

        $cities = [];

        // Process each entry in the data array
        foreach ($data as $cityData) {
            $newCity = City::create([
                'departament_id' => $cityData['departament_id'],
                'city_name' => $cityData['city_name'],
            ]);

            if (!$newCity) {
                return response()->json([
                    'message' => 'Error creating a new City!',
                    'status' => 500,
                ], 500);
            }

            $cities[] = $newCity;
        }

        return response()->json([
            'message' => 'Cities created successfully',
            'cities' => $cities,
            'status' => 201,
        ], 201);
    }
}
