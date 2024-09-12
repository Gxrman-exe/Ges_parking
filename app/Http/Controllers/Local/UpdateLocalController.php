<?php

namespace App\Http\Controllers\Local;

use App\Http\Controllers\Controller;
use App\Models\Local;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UpdateLocalController extends Controller
{
    public function update(Request $request, $id) 
    {
        $local = Local::find($id);
        if (!$local) {
            $data = [
                'message' => 'Local not found',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

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

        $local->local_name = $request->local_name;
        $local->nit = $request->nit;
        $local->direction = $request->direction;
        $local->active = $request->active;
        $local->iva_enabled = $request->iva_enabled;
        $local->iva_percentage = $request->iva_percentage;
        $local->local_code = $request->local_code;
        $local->rate_time = $request->rate_time;
        $local->license_type = $request->license_type;
        $local->license = $request->license;
        $local->rate_value = $request->rate_value;
        $local->max_output_time = $request->max_output_time;
        $local->available_spaces = $request->available_spaces;

        $local->save();

        return response()->json([
            'local' => $local,
            'message' => 'Local successfully updated',
            'status' => 200
        ], 200);
    }
}
