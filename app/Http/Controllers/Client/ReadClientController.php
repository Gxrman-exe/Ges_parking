<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ReadClientController extends Controller
{
    public function index () {
        $client = Client::all();
        $data = $client->isEmpty()
        ? [
            'message' => 'Client not found!',
            'status' => 404,
        ]
        : $client;
        return response()->json($data, 200);
    }
}
