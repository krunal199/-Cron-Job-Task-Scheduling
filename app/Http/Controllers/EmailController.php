<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Mail\SendPDFMail;
use PDF;
use Mail;

class EmailController extends Controller
{
    public function index()
    {
        $product = Product::all();
        $data['product'] = $product;
        $pdf = PDF::loadView('pdf.stockreportpdf', $data);

        $to_email = "testqueue123@yopmail.com";

        Mail::to($to_email)->send(new SendPDFMail($pdf));

        return response()->json(['status' => 'success', 'message' => 'Report has been sent successfully.']);
    }
}
