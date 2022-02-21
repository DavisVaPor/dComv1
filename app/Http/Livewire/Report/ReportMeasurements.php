<?php

namespace App\Http\Livewire\Report;

use App\Models\Measurement;
use App\Models\Report;
use App\Models\Ubigee;
use Livewire\Component;
use Livewire\WithPagination;

class ReportMeasurements extends Component
{
    use WithPagination;
    public $report;
    public $provincia;
    public $distrito;
    public $measurement;
    public $modalAdd = false;
    public $modalDel = false;

    protected $rules = [
        'measurement.ubicacion' => 'required',
        'measurement.latitud' => 'required',
        'measurement.longitud' => 'required',
        'measurement.rni' => 'required',
        'measurement.fecha' => 'required',
    ];

    protected $listeners = ['measurementAdd' => 'render',
                            'measurementSup' => 'render',];

    public function mount(Report $informe)
    {
        $this->report = $informe;
    }
    public function render()
    {
        $ubigees = Ubigee::where('provincia',$this->provincia )->get();
        return view('livewire.report.report-measurements',[
            'ubigees' => $ubigees,
        ]);
    }

    public function addModal()
    {
        $this->reset('measurement');
        $this->modalAdd = true;
    }

    public function save()
    {
        $this->validate();
        if (isset($this->measurement->id)) {
            $this->measurement->save();
        } else {
            $measurement = Measurement::create([
                'ubicacion' => $this->measurement['ubicacion'],
                'latitud' => $this->measurement['latitud'],
                'longitud' => $this->measurement['longitud'],
                'rni' => $this->measurement['rni'],
                'fecha' => $this->measurement['fecha'],
                'ubigee_id' => $this->distrito,
                'report_id' => $this->report->id,
            ]);
        }
        $this->emit('measurementAdd');
        $this->modalAdd = false;
    }

    public function del($id)
    {
        $this->reset('measurement');
        $this->modalDel = $id;
    }

    public function mostrarDel($id)
    {
        $this->modalDel = $id;
    }

    public function delete(Measurement $measurement)
    {
        $measurement->delete();
        $this->modalDel = false;
        $this->emit('measurementSup');
    }

    public function edit(Measurement $measurement)
    {
        $this->measurement = $measurement;
        $this->modalAdd = true;
    }
}
