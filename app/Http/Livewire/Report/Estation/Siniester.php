<?php

namespace App\Http\Livewire\Report\Estation;

use App\Models\Estation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Siniester extends Component
{
    public $informe;
    public $estation;
    public $siniestrado;
    public $siniestradoOld;
    public $modalStatus = false;
    public $observationdetalle;

    protected $listeners = ['SiensterAdd' => 'render',];

    protected $rules = [
        'observationdetalle' => 'required|min:50',
    ];

    public function mount(Estation $estation)
    {
        $this->estation = $estation;
    }

    public function render()
    {
        return view('livewire.report.estation.siniester');
    }

    public function editStatus()
    {
        $this->siniestrado = $this->estation->siniestrado;
        $this->siniestradoOld = $this->estation->siniestrado;
        $this->modalStatus = true;
    }

    public function addSiniester(){
        
        if (isset($this->observationdetalle) && $this->siniestrado == 'SI') {
            
            $this->estation->siniestrado = $this->siniestrado;
            $this->estation->save();

            $this->validate();
            $this->informe->observations()->create([
                'detalle' => 'SINIESTRO SUCITADO EN LA ESTACION'.' '.$this->estation->name.' '.$this->observationdetalle,
                'nivel' => 'ALTA',
                'user_id' => Auth::user()->id,
                'estation_id' => $this->estation->id,
            ]);
            $this->emit('SiensterAdd');
        } else {
            
        }
        $this->modalStatus = false;

    }
    
}
