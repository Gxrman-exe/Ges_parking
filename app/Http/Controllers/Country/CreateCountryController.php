<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CreateCountryController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        // If a single object is sent, we convert it to an array to process it uniformly
        if (isset($data['country_name']) && isset($data['country_code'])) {
            $data = [$data];
        }

        // Validation for handling both an array and a single object
        $validator = Validator::make($data, [
            '*.country_name' => 'required|string|max:70',
            '*.country_code' => 'required|string|max:3',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Error in data validation',
                'errors' => $validator->errors(),
                'status' => 400,
            ], 400);
        }

        $countries = [];

        // Process each entry in the data array
        foreach ($data as $countryData) {
            $newCountry = Country::create([
                'country_name' => $countryData['country_name'],
                'country_code' => $countryData['country_code'],
            ]);

            if (!$newCountry) {
                return response()->json([
                    'message' => 'Error creating a new country',
                    'status' => 500,
                ], 500);
            }

            $countries[] = $newCountry;
        }

        return response()->json([
            'message' => 'Countries created successfully',
            'countries' => $countries,
            'status' => 201,
        ], 201);
    }
}
