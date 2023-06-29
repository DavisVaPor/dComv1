<?php

namespace App\Http\Livewire\Report\Article;

use App\Models\Article;
use App\Models\Estation;
use App\Models\System;
use Livewire\WithFileUploads;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class InstallEquipament extends Component
{
    use WithFileUploads;
    public $estation;
    public $informe;
    public $ArticleSelect;
    public $SystemSelect;
    public $file_url;
    public $fecha;
    public $article;
    public $fechaActual;
    
    public $modalAdd =  false;

    protected $rules = [
        'ArticleSelect' => 'required',
        'SystemSelect' => 'required',
        'fecha' => 'required|date|before:fechaActual',
    ];

    protected $listeners = [
        'EquipoInstall' => 'render',
        'activitySup' => 'render',
        'EquipoRetiro' => 'render',
    ];

    public function mount(Estation $estation)
    {
        $this->estation = $estation;
    }

    public function render()
    {
        $systems = System::all();
        $this->fechaActual = date('Y-m-d');

        $articles = $this->informe->commission->articles;

        return view('livewire.report.article.install-equipament',[
            'systems' => $systems,
            'articles' => $articles,
        ]);
    }

    public function addModal()
    {
        $this->reset('ArticleSelect', 'SystemSelect','fecha', 'file_url');
        $this->modalAdd = true;
    }

    public function moviment()
    {
        $this->validate();
        $article = Article::findOrFail($this->ArticleSelect);

        //$acta_url = $this->file_url->store('Movimient'.'/'.'Installations'.'/'.$article->id.'-'.$article->codPatrimonial);

        $article->movimient()->create([
            'tipo_movimiento' => 'INSTALACION',
            'fecha_move' => $this->fecha,
            //'acta' => $acta_url,
            'report_id' => $this->informe->id,
            'estacion_out_id' =>  $article->estation->id,
            'estacion_out_name' =>  $article->estation->name,
            'estation_id' => $this->estation->id,
            'user_id' => Auth::user()->id,
        ]);
        
        $article->system_id = $this->SystemSelect;
        $article->estation_id = $this->estation->id;
        $article->save();
        $this->modalAdd = false;

        $this->emit('EquipoInstall');

    }
}
