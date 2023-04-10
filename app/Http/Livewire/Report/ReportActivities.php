<?php

namespace App\Http\Livewire\Report;

use Livewire\Component;
use App\Models\Activity;
use App\Models\Estation;

class ReportActivities extends Component
{
    public $informe;
    public $estation;
    public $activity;
    public $selectedEstation;

    public $estadoEstacion;

    public $modalAdd = false;
    public $modalDel = false;



    protected $rules = [
        'activity.descripcion' => 'required',
        'activity.tipoActivity' => 'required',
        'activity.fechaInicio' => 'required',
        'activity.fechaFin' => 'required',
    ];

    protected $listeners = [
        'activityAdd' => 'render',
        'activitySup' => 'render',
    ];

    public function mount(Estation $estation)
    {
        $this->estation = $estation;
    }

    public function render()
    {

        return view('livewire.report.report-activities',[
  
        ]);
    }
    public function addModal()
    {
        $this->reset('activity');
        $this->modalAdd = true;
    }

    public function saveActivity()
    {
        $this->validate();
        if (isset($this->activity->id)) {
            $this->activity->save();
        } else {
            $this->informe->activities()->create([
                'descripcion' => $this->activity['descripcion'],
                'tipoActivity' => $this->activity['tipoActivity'],
                'estation_id' => $this->estation->id,
                'fechaInicio' => $this->activity['fechaInicio'],
                'fechaFin' => $this->activity['fechaFin'],
            ]);
        }
        $this->emit('activityAdd');
        $this->reset('activity');
        $this->modalAdd = false;
    }

    public function mostrarDel($id)
    {
        $this->modalDel = $id;
    }

    public function deleteActivity(Activity $activity)
    {
        $activity->delete();
        $this->modalDel = false;
        $this->emit('activitySup');
    }

    public function editActivity(Activity $activity)
    {
        $this->activity = $activity;
        $this->selectedEstation = $this->activity->estation_id;
        $this->modalAdd = true;
    }

}
