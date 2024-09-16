<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Inventory;
use App\Models\ModelProduct;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Log;
use Picqer\Barcode\BarcodeGeneratorPNG;

class AdminController extends Controller
{
    //
    public function desktopView()
    {
        return view('admin/dashboard');
    }

    public function getBarcodeExample(Request $data) 
    {
        $generator = new BarcodeGeneratorPNG();
        $barcode = $generator->getBarcode($data->codeID, $generator::TYPE_CODE_39);

        $barcodeBase64 = base64_encode($barcode);
        $arrBarCode[] =  'data:image/png;base64,' . $barcodeBase64;
        $arrBarCode[] =  'data:image/png;base64,' . $barcodeBase64;
        $arrBarCode[] =  'data:image/png;base64,' . $barcodeBase64;
        $arrBarCode[] =  'data:image/png;base64,' . $barcodeBase64;
        $arrBarCode[] =  'data:image/png;base64,' . $barcodeBase64;
        $arrBarCode[] =  'data:image/png;base64,' . $barcodeBase64;



        return  response()->json(['success' => true, 'message' => $arrBarCode]);

    }


    public function getBodegas() {
        try {
            $inventory = Stock::all();

          
            return response()->json(['success' => true, 'message' => 'Registrado exitosamente.', 'data' => $inventory ]);
        }
        catch(\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Algun error']);

        }
    }


    public function storeProducts(Request $request) {
        $name = $request->input('nameProduct');
        $marca = $request->input('marca');
        $genero = $request->input('generoValue');
        $arrProducts = $request->input("elements");

        $model = ModelProduct::find($request->input('modelValue'));
        $codeIDModel = $model->codeID;

        Log::debug('buscando error', $arrProducts);
       foreach($arrProducts as $product) {
        $idProduct = $codeIDModel .''.$product['talla'];
        $productToEdit = Product::where('codeID',$idProduct)->first();

        if ($productToEdit){
            $cantidas = $productToEdit->cantidad;
            $cantidas++;
            $productToEdit-save();

        } else {
            $productModel = new Product();
            $productModel->name = $name;
            $productModel->model_id = $model->id;
            $productModel->codeID = $idProduct;
            $productModel->name = $name;
            $productModel->price =  $product['price'];
            $productModel->priceCompra = $product['priceBuyed'];
            $productModel->cantidad = 1;
            $productModel->images = "";
            $productModel->brand = $marca;
            $productModel->tags = "";
            $productModel->gender = $genero;
            $productModel->active = true;
            $productModel->fecha_activacion = date('Y-m-d H:i:s');
            $productModel->save();


        }

       }

    }
}
