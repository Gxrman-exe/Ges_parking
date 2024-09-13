<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class UpdateClientController extends Controller
{
    public function update(Request $request, $id)
    {
        $client = Client::find($id);
        if (!$client) {
            $data = [
                'message' => 'Client not fount!',
                'status' => 400
            ];
            return response()->json($data, 400);
        };

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
            return response()->json([
                'message' => 'Error in data validation',
                'errors' => $validator->errors(),
                'status' => 400,
            ], 400);
        };
        $client->names = $request->names;
        $client->surnames = $request->surnames;
        $client->document_type = $request->document_type;
        $client->document = $request->document;
        $client->e_mail = $request->e_mail;
        $client->phone_number = $request->phone_number;
        $client->direction = $request->direction;
        $client->save();

        return response()->json([
            'client' => $client,
            'message' => 'Local successfully updated',
            'status' => 200
        ], 200);
    }
}
