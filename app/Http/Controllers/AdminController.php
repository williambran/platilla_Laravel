<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
