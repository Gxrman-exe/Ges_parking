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
        // Validate input data
        $validator = Validator::make($request->all(), [
            'names' => 'required|string|max:50',
            'surnames' => 'required|string|max:50',
            'document_type' => 'required|string|max:50',
            'document' => 'required|string|max:11|unique:clients,document',
            'e_mail' => 'required|string|email|max:70|unique:clients,e_mail',
            'phone_number' => 'required|string|max:20',
            'direction' => 'required|string|max:100',
        ]);

        if ($validator->fails()) {
            // Return validation errors
            return response()->json([
                'message' => 'Error in data validation',
                'errors' => $validator->errors(),
                'status' => 400
            ], 400);
        }

        // Check if a client with the same document or email already exists
        $existingClient = Client::where('document', $request->document)
            ->orWhere('e_mail', $request->e_mail)
            ->first();

        if ($existingClient) {
            return response()->json([
                'message' => 'Client already exists with document: ' . $request->document . ' or email: ' . $request->e_mail,
                'status' => 409, // Conflict status
            ], 409);
        }

        // Create a new client
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
