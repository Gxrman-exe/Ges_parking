<?php

namespace App\Http\Controllers\Departament;

use App\Http\Controllers\Controller;
use App\Models\Departament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CreateDepartamentController extends Controller
{
    public function store (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'country_id' => 'required|exists:countries,id',
            'departament_name' => 'required|string|max:70',
            'departament_code' => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error in data validation',
                'errors' => $validator->errors(),
                'status' => 400,
            ];
            return response()->json($data, 400);
        }

        $createDepartament = Departament::create([
            'country_id' => $request->country_id,
            'departament_name' => $request->departament_name,
            'departament_code' => $request->departament_code,
        ]);
        if (!$createDepartament) {
            $data =[
                'message'  => 'Error creating a new Departament',
                'status' => 500,
            ];
            return response()->json($data, 500);
        };
        $data = [
            'departament' => $createDepartament,
            '201' => 201,
        ];
        return response()->json($data, 201);
    }
};
