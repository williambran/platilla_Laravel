<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stock;
use Illuminate\Database\QueryException;



class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $stock = Stock::All();
        return $stock;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $stock = new Stock;
        $stock->name = $request->name;
        $stock->save();       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $stock = Stock::where('id', $id)->first();
        return $stock;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            $stock = Stock::where('id', $id)->first();

            if(empty($stock)) {
                return response()->json(['success' => false, 'message' => 'El elemento ya se elimino.']);

            }
            $stock->delete();
        } catch(QueryException $e) {
            return response()->json(['success' => false, 'message' => 'Ocurrió un error.']);

        }
        return response()->json(['success' => true, 'message' => 'Se elimino correctamente.']);



    }

  /*  public function recover($id) {
        try {
            $stock = Stock::where('id', $id);
            $stock->restore();
        } catch(QueryException $e) {
            return response()->json(['success' => false, 'message' => 'Ocurrió un error al restaurar camion.']);

        }
        return response()->json(['success' => true, 'message' => 'Camion activo nuevamente.']);

    }*/
}
