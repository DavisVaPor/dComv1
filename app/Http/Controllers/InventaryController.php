<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class InventaryController extends Controller
{
    public function index(){
        return view('backend.inventary.index');
    }
    
    public function show(Article $article){
        return  view('backend.inventary.show',compact('article'));
    }
}
