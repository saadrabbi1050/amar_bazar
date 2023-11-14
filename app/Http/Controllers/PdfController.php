<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function productPDFGenerate()
    {
       $products =  Product::all();
       
       $fileName = 'products.pdf';

       $html = view('backend.products.product_pdf', compact('products'))->render();

       $mpdf = new \Mpdf\Mpdf();

       $mpdf->SetWatermarkText('SEIP PONDIT');
       $mpdf->showWatermarkText = true;    


       $mpdf->WriteHTML($html);
       
       $mpdf->Output($fileName,'D');

    }
}
