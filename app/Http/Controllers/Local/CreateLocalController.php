<?php

namespace App\Http\Controllers\Local;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Local;

class CreateLocalController extends Controller
{
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'city_id' => 'required|exists:cities,id',
            'local_name' => 'required|string|max:50',
            'nit' => 'required|string|max:20',
            'direction' => 'required|string|max:70',
            'active' => 'required|boolean',
            'iva_enabled' => 'required|boolean',
            'iva_percentage' => 'nullable|numeric|between:0,99.99',
            'local_code' => 'required|string|max:20',
            'rate_time' => 'nullable|numeric|between:0,999999.99',
            'license_type' => 'required|string|max:40',
            'license' => 'required|string|max:30',
            'rate_value' => 'nullable|numeric|between:0,999999.99',
            'max_output_time' => 'nullable|integer|min:0',
            'available_spaces' => 'nullable|integer|min:0',
        ]);

        
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Error in data validation',
                'errors' => $validator->errors(),
                'status' => 400,
            ], 400);
        }

        
        $newLocal = Local::create([
            'city_id' => $request->city_id,
            'local_name' => $request->local_name,
            'nit' => $request->nit,
            'direction' => $request->direction,
            'active' => $request->active,
            'iva_enabled' => $request->iva_enabled,
            'iva_percentage' => $request->iva_percentage,
            'local_code' => $request->local_code,
            'rate_time' => $request->rate_time,
            'license_type' => $request->license_type,
            'license' => $request->license,
            'rate_value' => $request->rate_value,
            'max_output_time' => $request->max_output_time,
            'available_spaces' => $request->available_spaces,
        ]);
        if (!$newLocal) {
            return response()->json([
                'message' => 'Error creating a new Local',
                'status' => 500,
            ], 500);
        }
        return response()->json([
            'local' => $newLocal,
            'status' => 201,
        ], 201);
    }
}
