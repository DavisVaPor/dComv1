<?php

namespace App\Http\Controllers;

use App\Models\Report;

class ReportController extends Controller
{
    
    public function index(){
        return view('backend.report.index');
    }

    public function show(Report $informe){
        return  view('backend.report.show',compact('informe'));
    }

    public function reporte(Report $informe )
    {
        $pdf = \PDF::loadView('reportes.informes',compact('informe'));
        //return view('reportes.informes',compact('informe'));
        return $pdf->download($informe->asunto.'.pdf');
    }
}
