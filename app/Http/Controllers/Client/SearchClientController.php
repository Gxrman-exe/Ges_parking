<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class SearchClientController extends Controller
{
    public function show($id)
    {
        $client = Client::find($id);
        if (!$client) {
            return response()->json([
                'message' => 'Client not found',
                'status' => 404
            ], 404);
        }
        return response()->json([
            'client' => $client,
            'status' => 200
        ], 200);
    }
}
