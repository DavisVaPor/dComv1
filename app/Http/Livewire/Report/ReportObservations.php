<?php

namespace App\Http\Livewire\Report;

use App\Models\Report;
use App\Models\Observation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ReportObservations extends Component
{
    public $report;
    public $observation;
    public $selectedEstation;

    public $modalAdd = false;
    public $modalDel = false;
    

    public function mount(Report $informe)
    {
        $this->report = $informe;
    }

    protected $listeners = ['observationAdd' => 'render',
                            'observationSup' => 'render',];

    protected $rules = [
        'observation.detalle' => 'required',
        'observation.nivel' => 'required',
    ];

    public function render()
    {
        return view('livewire.report.report-observations');
    }

    public function addModal()
    {
        $this->reset('observation','selectedEstation');
        $this->modalAdd = true;
    }

    public function delObservation($id)
    {
        $this->reset('observation');
        $this->modalDel = $id;
    }

    public function saveObservation()
    {
        $this->validate();
        if (isset($this->observation->id)) {
            $this->observation->save();
        } else {
            $this->report->observations()->create([
                'detalle' => $this->observation['detalle'],
                'nivel' => $this->observation['nivel'],
                'user_id' => Auth::user()->id,
                'estation_id' => $this->selectedEstation,
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
