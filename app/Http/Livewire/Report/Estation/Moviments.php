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

    public function infoActa(Movements $moviment)
    {
        $this->modalActa = true;
        $this->actamovimiento =  $moviment;
    }

    public function deleteModal($id)
    {
        $this->movement = Movements::findOrFail($id);
        $this->article = Article::findOrFail($this->movement->article_id);
        $this->modalSup =  $id;
    }

    public function deleteMovimient(Movements $movement)
    {
        $this->article->estation_id = $this->movement->estacion_out_id;
        Storage::delete($movement->acta);
        $movement->delete();
        $this->article->save();
        $this->modalSup = false;
        $this->emit('movementDelete');
    }

}
