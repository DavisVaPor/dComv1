<?php

namespace App\Http\Livewire\Report;

use App\Models\Article;
use App\Models\Estation;
use App\Models\System;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Http\Request;

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
 
    protected $rules = [
        'articulo.estado' => 'required',
        'articulo.tipo' => 'required',
        'obbArticle' => 'string',
    ]; 

    protected $listeners = ['ArtAdd' => 'render',
                            'ArtEdit' => 'render',
                            'EquipoInstall' => 'render',
                            'EquipoRetiro' => 'render'];

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

    public function addModal($art)
    {
        $this->articulo = Article::findOrFail($art);
        $this->estadoOld = ''. $this->articulo->estado;
        $this->modalEdit = true;
    }

    public function updateArticle(){
        $this->validate();
        if (isset($this->articulo->id)) {
            $this->articulo->save();
        }
        if (!empty($this->obbArticle)) {
            if ($this->estadoOld === $this->articulo->estado ) {
                $cambios = ''.$this->articulo->estado;
            } else {
                $cambios = $this->estadoOld. ' X ' . $this->articulo->estado;
            }
            $this->articulo->manintenance()->create([
                'descripcion' => $this->obbArticle,
                'cambios' => $cambios,  
                'tipo' => $this->article['tipo'],  
                'user_id' => Auth::user()->id,
                'report_id' => $this->informe->id,
             ]);
        }
        $this->obbArticle = '';
        $this->estadoOld = '';
        $this->modalEdit = false;
        $this->emit('ArtEdit');
        $this->reset('articulo');
    }
}
