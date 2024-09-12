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
        $validator = Validator::make($request->all(), [
            'departament_id' => 'required|exists:departaments,id',
            'city_name' => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error in data validation',
                'errors' => $validator->errors(),
                'status' => 400,
            ];
            return response()->json($data, 400);
        };
        $newCity = City::create([
            'departament_id' => $request->departament_id,
            'city_name' => $request->city_name,
        ]);
        if (!$newCity) {
            $data =[
                'message'  => 'Error creating a new City!',
                'status' => 500,
            ];
            return response()->json($data, 500);
        };
        $data = [
            'city' => $newCity,
            '201' => 201,
        ];
        return response()->json($data, 201);
    }
}
