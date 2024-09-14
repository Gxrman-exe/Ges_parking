<?php

namespace App\Http\Controllers\Vehicle;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class ReadVehicleController extends Controller
{
    public function index() {
        $fetchedVehicle = Vehicle::all();
        return $fetchedVehicle->isEmpty()
        ? response()->json([
            'message' => 'There are no registered vehicles!',
            'status' => 400], 200)
        : response()->json($fetchedVehicle, 200);
    }
}
