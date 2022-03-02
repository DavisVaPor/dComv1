<?php

namespace App\Http\Controllers;

use App\Models\Estation;
use Illuminate\Http\Request;

class EstationController extends Controller
{
    public function index(){
        return view('backend.estation.index');
    }

    public function show(Estation $estation){
        
        return  view('backend.estation.show',compact('estation'));
    }

}
