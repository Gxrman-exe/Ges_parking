<?php

namespace App\Http\Controllers\Local;

use App\Http\Controllers\Controller;
use App\Models\Local;
use Illuminate\Http\Request;

class ReadLocalController extends Controller
{
    public function index()
    {
        $fetchdLocals = Local::all();
        return $fetchdLocals->isEmpty()
        ? response()->json([
            'message' => 'There are no registered cities!',
            'status' => 400], 200)
        : response()->json($fetchdLocals, 200);
    }
}
