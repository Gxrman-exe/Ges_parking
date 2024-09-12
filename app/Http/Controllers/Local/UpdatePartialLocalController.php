<?php

namespace App\Http\Controllers\Local;

use App\Http\Controllers\Controller;
use App\Models\Local;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UpdatePartialLocalController extends Controller
{
    public function updatePartial(Request $request, $id)
    {
        $local = Local::find($id);

        if (!$local) {
            return response()->json([
                'message' => 'Local not found',
                'status' => 404
            ], 404);
        }

        // Definir las reglas de validación
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

        // Actualización utilizando operadores ternarios
        $local->city_id = $request->input('city_id') ?: $local->city_id;
        $local->local_name = $request->input('local_name') ?: $local->local_name;
        $local->nit = $request->input('nit') ?: $local->nit;
        $local->direction = $request->input('direction') ?: $local->direction;
        $local->active = $request->input('active') ?? $local->active; // Permite booleano false
        $local->iva_enabled = $request->input('iva_enabled') ?? $local->iva_enabled;
        $local->iva_percentage = $request->input('iva_percentage') ?? $local->iva_percentage;
        $local->local_code = $request->input('local_code') ?: $local->local_code;
        $local->rate_time = $request->input('rate_time') ?? $local->rate_time;
        $local->license_type = $request->input('license_type') ?: $local->license_type;
        $local->license = $request->input('license') ?: $local->license;
        $local->rate_value = $request->input('rate_value') ?? $local->rate_value;
        $local->max_output_time = $request->input('max_output_time') ?? $local->max_output_time;
        $local->available_spaces = $request->input('available_spaces') ?? $local->available_spaces;

        // Guardar cambios
        $local->save();

        return response()->json([
            'message' => 'Local updated successfully',
            'local' => $local,
            'status' => 200
        ], 200);
    }
}
