<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use Session;

class DynamicPDFController extends Controller
{
    function xuatPDFTatCa(Request $request){

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($request->session()->get('tableData'));
        return $pdf->stream();
    }

    function setSession(Request $request){
        Session::put('tableData', $request->tableData);
        return 1;
    }
}
