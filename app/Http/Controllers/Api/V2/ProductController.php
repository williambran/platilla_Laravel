<?php
namespace App\Http\Controllers\Api\V2;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;


use App\Models\Product;
use App\Models\Stock;


use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return $products = Product::latest()->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'imageCover' => 'required',
            'price' => 'required',
            'model' => 'required',
            'talla' => 'required',
            'stock_id' => 'required'
    
          ]);
        
        $stock =  Stock::where('id', $request->stock_id )->first();
        $stock->name = $request->nameStock;

       $product = new Product;
       $product->name = $request->name;
       $product->imageCover = $request->imageCover;
       $product->images = $request->images;
       $product->brand = $request->brand;
       $product->tags = $request->tags;
       $product->price = $request->price;
       $product->active = $request->active ?? 0 ;
       $product->shipplable = $request->shipplable ?? 0;
       $product->weight = $request->weight;
       $product->height = $request->height;
       $product->width = $request->width;
       $product->length = $request->length;
       $product->dealer = $request->dealer;
       $product->presention = $request->presention;
       $product->model = $request->model;
       $product->talla = $request->talla;
       $product->expiration = $request->expiration;
       $product->stock_id = $stock->id;

       $product->save();
       return response()->json([
        'mensaje' => 'Success'
      ],204); 
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
        $product = Product::where('id',$id);
        return  $product;
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
        $product = Product::find($id);
        $product->delete();

    }

    public function recover($id) {
        try {
            $product = Product::where('id', $id);
            $product->restore();
        } catch(QueryException $e) {
            return response()->json(['success' => false, 'message' => 'Ocurrió un error al restaurar camion.']);

        }
        return response()->json(['success' => true, 'message' => 'Camion activo nuevamente.']);


    }
}
