<?php

namespace App\Http\Livewire\Report;

use App\Models\Estation;
use App\Models\Observation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ReportObservations extends Component
{
    public $informe;
    public $estation;
    public $observation;

    public $modalAdd = false;
    public $modalDel = false;
    

    public function mount(Estation $estation)
    {
        $this->estation = $estation;
    }

    protected $listeners = ['observationAdd' => 'render',
                            'observationSup' => 'render',
                            'SiensterAdd' => 'render'];

    protected $rules = [
        'observation.detalle' => 'required|min:50',
        'observation.nivel' => 'required',
    ];

    public function render()
    {
        return view('livewire.report.report-observations');
    }

    public function addModal()
    {
        $this->reset('observation');
        $this->modalAdd = true;
    }

    public function saveObservation()
    {
        $this->validate();
        if (isset($this->observation->id)) {
            $this->observation->save();
        } else {
            $this->informe->observations()->create([
                'detalle' => $this->observation['detalle'],
                'nivel' => $this->observation['nivel'],
                'user_id' => Auth::user()->id,
                'estation_id' => $this->estation->id,
            ]);
        }
        $this->modalAdd = false;
        $this->emit('observationAdd');
    }

    public function mostrarDel($id)
    {
        $this->modalDel = $id;
    }

    public function deleteObservation(Observation $observation)
    {
        $observation->delete();
        $this->modalDel = false;
        $this->emit('observationSup');
    }
    
    public function editObservation(Observation $observation)
    {
        $this->observation = $observation;
        $this->modalAdd = true;
    }
}
