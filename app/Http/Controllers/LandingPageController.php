<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use App\Models\Estation;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
       $commissions = Commission::where('anho','LIKE',date('Y'))
                                ->get();
       $estations = Estation::all();
       $estationDef = Estation::where('estado','LIKE','INOPERATIVO')->get();

       $estationDef = 100 * ($estationDef->count()/$estations->count());

       $estationDef = number_format($estationDef,2);

       return view('backend.dashboard',[
            'commissions' => $commissions,
            'estations' => $estations,
            'estationDef' => $estationDef
       ]);
    }
}
