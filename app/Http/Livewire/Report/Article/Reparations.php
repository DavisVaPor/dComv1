<?php

namespace App\Http\Livewire\Report\Article;

use App\Models\Article;
use App\Models\EquipamentMaintenance;
use App\Models\Estation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Reparations extends Component
{
    public $estation;
    public $informe;
    public $articulo;
    public $estado;
    public $estadoOld;
    public $modalEdit;
    public $obbArticle;


    public function mount(Article $article)
    {
        $this->articulo = $article;
    }

    
    public function render()
    {
        return view('livewire.report.article.reparations',[

        ]);
    }

    public function addModal()
    {
        $this->estado =  $this->articulo->estado;
        $this->estadoOld = ''. $this->articulo->estado;
        $this->modalEdit = true;
    }

    public function updateArticle(){
        $this->validate();
        if (!empty($this->obbArticle)) {
            if ($this->estadoOld === $this->articulo->estado ) {
                $cambios = ''.$this->estado;
            } else {
                $cambios = $this->estadoOld. ' X ' . $this->estado;
            }
            $this->articulo->manintenance()->create([
                'descripcion' => $this->obbArticle,
                'cambios' => $cambios,  
                'tipo' => $this->articulo['tipo'],  
                'user_id' => Auth::user()->id,
                'report_id' => $this->informe->id,
             ]);
             $this->articulo->estado = $this->estado;
             $this->articulo->save();
        }
        $this->obbArticle = '';
        $this->estadoOld = '';
        $this->modalEdit = false;
        $this->emit('ArtEdit');
        $this->reset('articulo','tipo','estado');
    }
}
