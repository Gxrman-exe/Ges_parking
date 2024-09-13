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

        // Si se envía un solo objeto, lo convertimos en un array
        if (isset($data['city_id']) && isset($data['local_name']) && isset($data['nit'])) {
            $data = [$data];
        }

        // Reglas de validación para manejar tanto un array como un solo objeto
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

        // Retornar errores de validación si los hay
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Error in data validation',
                'errors' => $validator->errors(),
                'status' => 400,
            ], 400);
        }

        $locals = [];

        // Procesar cada registro en el array de datos
        foreach ($data as $localData) {
            // Verificar si ya existe un local con el mismo city_id, local_name o NIT
            $existingLocal = Local::where('city_id', $localData['city_id'])
                ->where(function ($query) use ($localData) {
                    $query->where('local_name', $localData['local_name'])
                          ->orWhere('nit', $localData['nit']);
                })
                ->first();

            if ($existingLocal) {
                return response()->json([
                    'message' => 'Local already exists with the same name or NIT in this city: ' . $localData['local_name'],
                    'status' => 409, // Conflict status
                ], 409);
            }

            // Crear un nuevo local
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

            // Retornar un error si no se pudo crear el local
            if (!$newLocal) {
                return response()->json([
                    'message' => 'Error creating a new Local',
                    'status' => 500,
                ], 500);
            }

            $locals[] = $newLocal;
        }

        // Retornar una respuesta exitosa con los registros creados
        return response()->json([
            'message' => 'Locals created successfully',
            'locals' => $locals,
            'status' => 201,
        ], 201);
    }
}
