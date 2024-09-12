<?php

namespace App\Http\Controllers\Local;

use App\Http\Controllers\Controller;
use App\Models\Local;
use Illuminate\Http\Request;

class SpecificLocalController extends Controller
{
    public function show($id) 
    {
        $local = Local::find($id);
        if (!$local) {
            return response()->json([
                'message' => 'The premises have not been found',
                'status' => 404
            ], 404);
        }
        return response()->json([
            'local' => $local,
            'status' => 200
        ], 200);
    }
}
