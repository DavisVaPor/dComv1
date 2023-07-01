<?php

namespace App\Http\Livewire\Report\Estation;

use App\Models\Article;
use App\Models\Estation;
use App\Models\Movements;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Moviments extends Component
{
    public $estation;
    public $informe;
    public $movement;
    public $article;
    public $actamovimiento;
    public $modalActa = false;
    public $modalSup = false;
    
    protected $listeners = [
        'movementDelete' => 'render',
        'EquipoInstall' => 'render',
        'EquipoRetiro' => 'render',
    ];

    public function mount(Estation $estation)
    {
        $this->estation = $estation;
    }
    
    public function render()
    {
        $movimients = Movements::where('report_id',$this->informe->id)
                                ->get();
        return view('livewire.report.estation.moviments',[
            'movimients' => $movimients,
        ]);
    }

    public function deleteModal($id)
    {
        $this->movement = Movements::findOrFail($id);
        $this->article = Article::findOrFail($this->movement->article_id);
        $this->modalSup = true;
    }

    public function deleteMovimient(Movements $movement)
    {
        $this->article->estation_id = $this->movement->estacion_out_id;
        $movement->delete();
        $this->article->save();
        $this->reset('movement');
        $this->emit('movementDelete');
        $this->modalSup = false;
    }

}
