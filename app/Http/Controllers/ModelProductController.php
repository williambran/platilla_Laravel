<?php

namespace App\Http\Controllers;

use App\Models\ModelProduct;
use App\Models\ModelSupplier;
use App\Models\Supplier;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class ModelProductController extends Controller
{
    //

    public function store(Request $request) {

        try {
            $modelo = new ModelProduct();
            $modelo->codeID = $request->codeID;
            $modelo->name = $request->name;
            $modelo->inventorie_id = $request->inventorieID;
            $modelo->imageCover = "";

    
            $modelo->save();

            //agregar provedor
            $supplier = Supplier::find($request->provedorId );


            $provedorModelo = new ModelSupplier();
            $provedorModelo->supplier_id = $supplier->id;
            $provedorModelo->model_id = $modelo->id;

            $provedorModelo->save();

            return response()->json(['success' => true, 'message' => 'Camión registrado exitosamente.']);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al eliminar el Modelo: ' . $e->getMessage()], 500);
        }
    }

    public function modelos(){
        try {
            $modelo =  ModelProduct::all();
            return response()->json(['success' => true, 'message' => 'Peticion exitosa', 'data' => $modelo]);


        } catch(\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al obtener elemento: ' . $e->getMessage()], 500);

        }


    }
}
