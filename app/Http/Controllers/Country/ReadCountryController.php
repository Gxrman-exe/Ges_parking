<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class ReadCountryController extends Controller
{
    public function index () {

        $showCountry = Country::all(); 
        if ($showCountry->isEmpty()) {
            $data = [
                'message' => 'There are no registered countries!',
                'status' => 404,
            ];
            return response()->json($data, 200);
        }
        return response()->json($showCountry, 200);
    }
}
