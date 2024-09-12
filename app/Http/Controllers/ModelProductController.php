<?php

namespace App\Http\Controllers;

use App\Models\ModelProduct;
use Illuminate\Http\Request;

class ModelProductController extends Controller
{
    //

    public function store(Request $request) {

        try {
            $modelo = new ModelProduct();
            $modelo->codeID = $request->codeID;
            $modelo->name = $request->name;
            $modelo->inventorie_id = $request->inventorie_id;
    
            $modelo->save();
            return response()->json(['success' => true, 'message' => 'Camión registrado exitosamente.']);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al eliminar el Modelo: ' . $e->getMessage()], 500);
        }
    }
}
