<?php

namespace App\Http\Livewire\Report;

use App\Models\Report;
use Livewire\Component;
use App\Models\Activity;
use App\Models\Estation;


class ReportActivities extends Component
{
    public $report; 
    public $estation; 
    public $activity;
    public $selectedEstation;

    public $modalAdd = false;
    public $modalDel = false;

    protected $rules = [
        'activity.descripcion' => 'required',
        'activity.tipoActivity' => 'required',
        'activity.fechaInicio' => 'required',
        'activity.fechaFin' => 'required',
    ];

    protected $listeners = ['activityAdd' => 'render',
                            'activitySup' => 'render',];

    public function mount(Report $informe)
    {
        $this->report = $informe;
    }

    public function render()
    {
        return view('livewire.report.report-activities');
    }
    public function addModal()
    {
        $this->reset('activity');
        $this->reset('selectedEstation');
        $this->modalAdd = true;
    }

    public function delActivity($id)
    {
        $this->reset('activity');
        $this->modalDel = $id;
    }

    public function saveActivity()
    {
        $this->validate();
        if (isset($this->activity->id)) {
            $this->activity->save();
        } else {
            $estation_name = Estation::where('id',$this->selectedEstation)->first();
            $activity = Activity::create([
                'descripcion' => $this->activity['descripcion'].'-'.'('.$estation_name->name.')',
                'tipoActivity' => $this->activity['tipoActivity'],
                'report_id' => $this->report->id,
                'estation_id' => $this->selectedEstation,
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
