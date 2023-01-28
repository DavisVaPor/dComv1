<?php

namespace App\Http\Livewire\Report;

use App\Models\Measurement;
use App\Models\Report;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class ReportMeasurements extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $report;
    public $measurement;
    public $latgra, $latmin, $latseg;
    public $latitud;
    public $longra, $lonmin, $lonseg;
    public $longitud;
    public $ubigeo;
    public $modalAdd = false;
    public $modalDel = false;
    public $imagen;
    public $modalImagen = false;


    protected $rules = [
        'measurement.ubicacion' => 'required',
        'latgra' => 'required',
        'latmin' => 'required',
        'latseg' => 'required',
        'longra' => 'required',
        'lonmin' => 'required',
        'lonseg' => 'required',
        'ubigeo' => 'required',
        'measurement.rni' => 'required',
        'measurement.fecha' => 'required',
        'measurement.imagen' => 'required | image',
    ];

    protected $listeners = ['measurementAdd' => 'render',
                            'measurementSup' => 'render',];

    public function mount(Report $informe)
    {
        $this->report = $informe;
    }
    public function render()
    {
        
        $this->latitud = $this->latgra.'°'.$this->latmin."'".$this->latseg.'"'.' S';
        $this->longitud = $this->longra.'°'.$this->lonmin."'".$this->lonseg.'"'.' W';

        return view('livewire.report.report-measurements',[]);
    }

    public function addModal()
    {
        $this->reset('measurement','ubigeo','latgra','latmin','latseg','longra','lonmin','lonseg');
        $this->modalAdd = true;
    }

    public function save()
    {
        $this->validate();
        if (isset($this->measurement->id)) {
            $this->measurement->save();
        } else {
            $lat = $this->latgra.$this->latmin.$this->latseg;
            $log = $this->longra.$this->lonmin.$this->lonseg;

            $imagen = $this->measurement['imagen']->storeAs('RNI'.'/'.$this->report->id,'UBI'.$lat.$log);

            Measurement::create([
                'ubicacion' => Str::upper($this->measurement['ubicacion']),
                'latitud' => $this->latitud,
                'longitud' => $this->longitud,
                'maps' => 'https://www.google.com/maps/place/'.$this->latitud.' '.$this->longitud,
                'rni' => $this->measurement['rni'],
                'fecha' => $this->measurement['fecha'],
                'imagen' => $imagen,
                'ubigee_id' => $this->ubigeo,
                'report_id' => $this->report->id,
            ]);
        }
        $this->emit('measurementAdd');
        $this->modalAdd = false;
    }

    public function mostrarDel($id)
    {
        $this->modalDel = $id;
    }

    public function del($id)
    {
        $this->reset('measurement');
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
        $this->latitud = $this->latgra.'°'.$this->latmin."'".$this->latseg.'"'.' S';
        $this->longitud = $this->longra.'°'.$this->lonmin."'".$this->lonseg.'"'.' W';
        $this->ubigeo = $this->measurement->ubigee->id;
        $this->modalAdd = true;
    }
    public function openModalImage()
    {
        $this->modalImagen = true;
    }
}
