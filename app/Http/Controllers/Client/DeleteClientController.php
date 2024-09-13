<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class DeleteClientController extends Controller
{
    public function destroy($id)
    {
        $client = Client::find($id);
        if(!$client) {
            return response()->json([
                'message' => 'Client not found',
                'status' => 404
            ], 404);
        }

        // Delete the client and return a successful response
        $client->delete();
        return response()->json([
            'message' => 'Client successfully removed',
            'status' => 200
        ], 200);
    }
}
