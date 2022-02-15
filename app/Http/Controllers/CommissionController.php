<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use Illuminate\Http\Request;

class CommissionController extends Controller
{
    public function index(){
        return view('backend.commission.index');
    }
    
    public function show(Commission $commission){
        return  view('backend.commission.show',compact('commission'));
    }

    public function report(Commission $commission)
    {
        $pdf = \PDF::loadView('reportes.commission',compact('commission'));
        //return view('commissionPDF',compact('commission'));
        return $pdf->download($commission->id.'.pdf');
    }
}
