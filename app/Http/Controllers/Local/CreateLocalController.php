<?php

namespace App\Http\Controllers\Local;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Local;

class CreateLocalController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        // If a single record is provided, convert it to an array
        if (isset($data['city_id']) && isset($data['local_name']) && isset($data['nit'])) {
            $data = [$data];
        }

        // Validation rules to handle both an array of records or a single record
        $validator = Validator::make($data, [
            '*.city_id' => 'required|exists:cities,id',
            '*.local_name' => 'required|string|max:50',
            '*.nit' => 'required|string|max:20',
            '*.direction' => 'required|string|max:70',
            '*.active' => 'required|boolean',
            '*.iva_enabled' => 'required|boolean',
            '*.iva_percentage' => 'nullable|numeric|between:0,99.99',
            '*.local_code' => 'required|string|max:20',
            '*.rate_time' => 'nullable|numeric|between:0,999999.99',
            '*.license_type' => 'required|string|max:40',
            '*.license' => 'required|string|max:30',
            '*.rate_value' => 'nullable|numeric|between:0,999999.99',
            '*.max_output_time' => 'nullable|integer|min:0',
            '*.available_spaces' => 'nullable|integer|min:0',
        ]);

        // Return validation errors if any
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Error in data validation',
                'errors' => $validator->errors(),
                'status' => 400,
            ], 400);
        }

        $locals = [];

        // Process each record in the array of data
        foreach ($data as $localData) {
            $newLocal = Local::create([
                'city_id' => $localData['city_id'],
                'local_name' => $localData['local_name'],
                'nit' => $localData['nit'],
                'direction' => $localData['direction'],
                'active' => $localData['active'],
                'iva_enabled' => $localData['iva_enabled'],
                'iva_percentage' => $localData['iva_percentage'],
                'local_code' => $localData['local_code'],
                'rate_time' => $localData['rate_time'],
                'license_type' => $localData['license_type'],
                'license' => $localData['license'],
                'rate_value' => $localData['rate_value'],
                'max_output_time' => $localData['max_output_time'],
                'available_spaces' => $localData['available_spaces'],
            ]);

            // Return an error if a record could not be created
            if (!$newLocal) {
                return response()->json([
                    'message' => 'Error creating a new Local',
                    'status' => 500,
                ], 500);
            }

            $locals[] = $newLocal;
        }

        // Return a successful response with the created records
        return response()->json([
            'locals' => $locals,
            'status' => 201,
        ], 201);
    }
}
