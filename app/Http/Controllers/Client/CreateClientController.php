<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CreateClientController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'names' => 'required|string|max:50',
            'surnames' => 'required|string|max:50',
            'document_type' => 'required|string|max:50',
            'document' => 'required|string|max:11',
            'e_mail' => 'required|string|email|max:70',
            'phone_number' => 'required|string|max:20',
            'direction' => 'required|string|max:100',
        ]);

        if ($validator->fails()) {
            // Retornar errores de validación
            return response()->json([
                'message' => 'Error in data validation',
                'errors' => $validator->errors(),
                'status' => 400
            ], 400);
        }

        // Crear un nuevo cliente
        $client = Client::create([
            'names' => $request->names,
            'surnames' => $request->surnames,
            'document_type' => $request->document_type,
            'document' => $request->document,
            'e_mail' => $request->e_mail,
            'phone_number' => $request->phone_number,
            'direction' => $request->direction,
        ]);

        if (!$client) {
            
            return response()->json([
                'message' => 'Error creating a client',
                'status' => 500
            ], 500);
        }

        return response()->json([
            'client' => $client,
            'status' => 201
        ], 201);
    }
}
