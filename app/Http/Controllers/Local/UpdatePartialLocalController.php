<?php

namespace App\Http\Controllers\Local;

use App\Http\Controllers\Controller;
use App\Models\Local;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UpdatePartialLocalController extends Controller
{
    public function patchUpdate(Request $request, $id)
    {
        $local = Local::find($id);

        if (!$local) {
            return response()->json([
                'message' => 'Local not found',
                'status' => 404
            ], 404);
        }

        // Define validation rules
        $validator = Validator::make($request->all(), [
            'city_id' => 'sometimes|exists:cities,id',
            'local_name' => 'sometimes|string|max:50',
            'nit' => 'sometimes|string|max:20',
            'direction' => 'sometimes|string|max:70',
            'active' => 'sometimes|boolean',
            'iva_enabled' => 'sometimes|boolean',
            'iva_percentage' => 'nullable|numeric|between:0,99.99',
            'local_code' => 'sometimes|string|max:20',
            'rate_time' => 'nullable|numeric|between:0,999999.99',
            'license_type' => 'sometimes|string|max:40',
            'license' => 'sometimes|string|max:30',
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

        // Update only the fields provided in the PATCH request
        $fields = [
            'city_id', 'local_name', 'nit', 'direction', 'active',
            'iva_enabled', 'iva_percentage', 'local_code', 'rate_time',
            'license_type', 'license', 'rate_value', 'max_output_time',
            'available_spaces'
        ];

        foreach ($fields as $field) {
            if ($request->filled($field)) {
                $local->$field = $request->input($field);
            }
        }

        // Saves
        $local->save();

        return response()->json([
            'message' => 'Local updated successfully',
            'local' => $local,
            'status' => 200
        ], 200);
    }
}
