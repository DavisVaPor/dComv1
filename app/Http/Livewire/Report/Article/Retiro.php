<?php

namespace App\Http\Livewire\Report\Article;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Retiro extends Component
{
    public $article;
    public $estation;
    public $informe;
    public $fecha;
    public $modalDel = false;
    public $fechaActual;

    protected $rules = [
        'fecha' => 'required|before:fechaActual',
    ];

    protected $listeners = [
        'EquipoRetiro' => 'render',
    ];

    public function mount(Article $article)
    {
        $this->article = $article;
    }

    public function render()
    {
        $this->fechaActual = date('Y-m-d');
        return view('livewire.report.article.retiro');
    }

    public function openModal()
    {
        $this->reset('fecha');
        $this->modalDel = true;
    }

    public function retiro()
    {
        $this->validate();

        // $this->article->commissions()->attach($this->informe->commission->id);
    
        $this->article->movimient()->create([
            'tipo_movimiento' => 'RETIRO',
            'fecha_move' => $this->fecha,
            'report_id' => $this->informe->id,
            'estacion_out_id' =>  $this->estation->id,
            'estacion_out_name' =>  $this->estation->name,
            'estation_id' => 1,
            'user_id' => Auth::user()->id,
        ]);


        $this->article->system_id = null;
        $this->article->estation_id = 1;
        $this->article->save();

        $this->emit('EquipoRetiro');

        $this->reset('fecha');

        $this->modalDel = false;
    }
}
