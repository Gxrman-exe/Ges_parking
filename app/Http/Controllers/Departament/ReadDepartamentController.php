<?php

namespace App\Http\Controllers\Departament;

use App\Http\Controllers\Controller;
use App\Models\Departament;
use Illuminate\Http\Request;

class ReadDepartamentController extends Controller
{
    public function index()
    {
        $showDepartament = Departament::all();
        return $showDepartament->isEmpty()
            ? response()->json([
                'message' => 'There are no registered departments!', 
                'status' => 404], 200)
            : response()->json($showDepartament, 200);
    }
}
