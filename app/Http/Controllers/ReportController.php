<?php

namespace App\Http\Controllers;

use App\Models\Report;

class ReportController extends Controller
{
    public function mostrar()
    {
        return view('bandeja.index');
    }
    
    public function index(){
        return view('backend.report.index');
    }

    public function show(Report $informe){
        return  view('backend.report.show',compact('informe'));
    }
}
