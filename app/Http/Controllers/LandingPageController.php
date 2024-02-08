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
       $estationsvhf = Estation::where('sistema','LIKE','VHF')->get();

       $estationvhfDef = Estation::where('sistema','LIKE','VHF')->where('estado','LIKE','OPERATIVO')->get();

       $estationshf = Estation::where('sistema','LIKE','HF')->get();

       $estationhfDef = Estation::where('sistema','LIKE','HF')->where('estado','LIKE','OPERATIVO')->get();

       $estationvhfDef = 100 * ($estationvhfDef->count()/$estationsvhf->count());

       $estationvhfDef = number_format($estationvhfDef,2);

       $estationhfDef = 100 * ($estationhfDef->count()/$estationshf->count());

       $estationhfDef = number_format($estationhfDef,2);

       return view('backend.dashboard',[
            'commissions' => $commissions,
            'estationsVHF' => $estationsvhf,
            'estationvfhDef' => $estationvhfDef,
            'estationsHF' => $estationshf,
            'estationhfDef' => $estationhfDef,
       ]);
    }
}
