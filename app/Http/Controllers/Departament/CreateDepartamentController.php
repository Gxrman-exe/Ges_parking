<?php

namespace App\Http\Controllers\Departament;

use App\Http\Controllers\Controller;
use App\Models\Departament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CreateDepartamentController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        // Si se envía un solo objeto, lo convertimos en un array
        if (isset($data['country_id']) && isset($data['departament_name']) && isset($data['departament_code'])) {
            $data = [$data];
        }

        // Validación para manejar tanto un array como un solo objeto
        $validator = Validator::make($data, [
            '*.country_id' => 'required|exists:countries,id',
            '*.departament_name' => 'required|string|max:70',
            '*.departament_code' => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Error in data validation',
                'errors' => $validator->errors(),
                'status' => 400,
            ], 400);
        }

        $departaments = [];

        // Procesar cada entrada en el array de datos
        foreach ($data as $departamentData) {
            // Verificar si ya existe un departamento con el mismo country_id y nombre o código
            $existingDepartament = Departament::where('country_id', $departamentData['country_id'])
                ->where(function($query) use ($departamentData) {
                    $query->where('departament_name', $departamentData['departament_name'])
                          ->orWhere('departament_code', $departamentData['departament_code']);
                })
                ->first();

            if ($existingDepartament) {
                return response()->json([
                    'message' => 'Departament already exists with the same name or code in this country: ' . $departamentData['departament_name'],
                    'status' => 409, // Conflict status
                ], 409);
            }

            // Crear un nuevo departamento
            $newDepartament = Departament::create([
                'country_id' => $departamentData['country_id'],
                'departament_name' => $departamentData['departament_name'],
                'departament_code' => $departamentData['departament_code'],
            ]);

            if (!$newDepartament) {
                return response()->json([
                    'message' => 'Error creating a new Departament',
                    'status' => 500,
                ], 500);
            }

            $departaments[] = $newDepartament;
        }

        return response()->json([
            'message' => 'Departaments created successfully',
            'departaments' => $departaments,
            'status' => 201,
        ], 201);
    }
}
