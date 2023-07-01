<?php

namespace App\Http\Livewire\Report;

use App\Models\Article;
use App\Models\Estation;
use App\Models\System;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ReportArticles extends Component
{   use WithPagination;
    public $obbArticle = '';
    public $estation;
    public $sistema;
    public $search = '';
    public $modalEdit = false;
    public $articulo;
    public $estadoOld = '';
    public $informe;
    public $estado;
    public $tipo;
 
    protected $rules = [
        'estado' => 'required',
        'tipo' => 'required',
        'obbArticle' => 'string',
    ]; 

    protected $listeners = ['ArtAdd' => 'render',
                            'ArtEdit' => 'render',
                            'EquipoInstall' => 'render',
                            'EquipoRetiro' => 'render',
                            'movementDelete' => 'render'];

    public function mount(Estation $estation)
    {
        $this->estation = $estation;
    }
    
    public function render()
    {
        $systems = System::all();
        $articles = Article::where('estation_id',$this->estation->id)
                            ->where('denominacion','LIKE', '%'.$this->search.'%')
                            ->where('system_id','LIKE', '%'.$this->sistema)
                            ->paginate(5);
        return view('livewire.report.report-articles',[
            'systems' => $systems,
            'articles' => $articles,
        ]);
    }

    
}
