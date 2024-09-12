<?php

namespace App\Http\Controllers\Local;

use App\Http\Controllers\Controller;
use App\Models\Local;
use Illuminate\Http\Request;

class DeleteLocalController extends Controller
{
    /**
     * Remove the specified local from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) 
    {
        // Buscar el local por su ID
        $local = Local::find($id);

        // Si el local no se encuentra, retornar un error 404
        if (!$local) {
            return response()->json([
                'message' => 'Local not found',
                'status' => 404
            ], 404);
        }

        // Eliminar el local y retornar una respuesta exitosa
        $local->delete();

        return response()->json([
            'message' => 'Local successfully removed',
            'status' => 200
        ], 200);
    }
}
