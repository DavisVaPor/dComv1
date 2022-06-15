<?php

namespace App\Http\Livewire\Report\Article;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Retiro extends Component
{
    use WithFileUploads;
    public $article;
    public $estation;
    public $informe;
    public $file_url;
    public $fecha;
    public $modalDel = false;

    protected $rules = [
        'file_url' => 'required',
        'fecha' => 'required',
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
        return view('livewire.report.article.retiro');
    }

    public function openModal()
    {
        $this->reset('fecha', 'file_url');
        $this->modalDel = true;
    }

    public function retiro()
    {
        $this->validate();

        $acta_url = $this->file_url->store('Movimient'.'/'.'Retiro'.'/'.$this->article->id.'-'.$this->article->codPatrimonial);

        $this->article->movimient()->create([
            'tipo_movimiento' => 'RETIRO',
            'fecha_move' => $this->fecha,
            'acta' => $acta_url,
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

        $this->modalDel = false;
    }
}
