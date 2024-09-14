<?php

namespace App\Http\Controllers\Vehicle;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CreateVehicleController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'local_id' => 'required|exists:locals,id',
            'client_id' => 'required|exists:clients,id',
            'plate' => 'required|string|max:6',
            'vehicle_type' => 'required|string|max:30',
            'locker_use' => 'required|boolean',
            'additional_value_locker' => 'nullable|numeric|between:0,999999.99',
            'helmet_use' => 'required|boolean',
            'additional_value_case' => 'nullable|numeric|between:0,999999.99',
            'vehicle_status' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            // Retornar errores de validación
            return response()->json([
                'message' => 'Error in data validation',
                'errors' => $validator->errors(),
                'status' => 400
            ], 400);
        }
        $vehicle = Vehicle::create([
            'local_id' => $request->local_id,
            'client_id' => $request->client_id,
            'names' => $request->names,
            'surnames' => $request->surnames,
            'document_type' => $request->document_type,
            'document' => $request->document,
            'e_mail' => $request->e_mail,
            'phone_number' => $request->phone_number,
            'direction' => $request->direction,
        ]);

        if(!$vehicle) {
            return response()->json([
                'message' => 'Error creating a vehicle!!',
                'status' => 500
            ]);
        }

        return response()->json([
            'vehicle' => $vehicle,
            'status' => 201
        ], 201);

    }
}
