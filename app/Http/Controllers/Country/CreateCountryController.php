<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CreateCountryController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'country_name' => 'required|string|max:70',
            'country_code' => 'required|string|max:3',
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error in data validation',
                'errors' => $validator->errors(),
                'status' => 400,
            ];
            return response()->json($data, 400);
        }

        $createCountry = Country::create([
            'country_name' => $request->country_name,
            'country_code' => $request->country_code,
        ]);
        if (!$createCountry) {
            $data =[
                'message'  => 'Error creating a new country',
                'status' => 500,
            ];
            return response()->json($data, 500);
        }

        $data = [
            'country' => $createCountry,
            '201' => 201,
        ];
        return response()->json($data, 201);
    }
}
