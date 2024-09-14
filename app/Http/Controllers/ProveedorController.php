<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProveedorController extends Controller
{
    //


    public function store(Request $request) {
        Log::info("debugeando");
        try {
            $supplier = new Supplier();
            $supplier->name = $request->name;
            $supplier->number = $request->number;
            $supplier->address = $request->address;

            $supplier->save();
            return response()->json(['success' => true, 'message' => 'Registrado exitosamente.', 'IDProvedor' =>  $supplier->id, 'name' => $supplier->name  ]);
        }
        catch(\Exception $e) {
            return response()->json(['success' => false, 'message' => 'No se pudo guardar']);

        }




    }

    public function getProvedores(){
        try {
            $supplier = Supplier::all();

          
            return response()->json(['success' => true, 'message' => 'Registrado exitosamente.', 'data' => $supplier ]);
        }
        catch(\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Algun error']);

        }
    }
}
