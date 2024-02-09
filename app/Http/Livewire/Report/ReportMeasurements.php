<?php

namespace App\Http\Livewire\Report;

use App\Models\Measurement;
use App\Models\Report;
use Illuminate\Support\Facades\Storage;
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
    public $openimagen;
    public $modalImagen = false;
    public $fechaActual;


    protected $rules = [
        'measurement.ubicacion' => 'required',
        'latgra' => 'required|integer|gt:0',
        'latmin' => 'required',
        'latseg' => 'required',
        'longra' => 'required|integer|gt:0',
        'lonmin' => 'required',
        'lonseg' => 'required',
        'ubigeo' => 'required',
        'measurement.rni' => 'required',
        'measurement.fecha' => 'required|before:fechaActual',
        'imagen' => 'required | image',
    ];

    protected $listeners = [
        'measurementAdd' => 'render',
        'measurementSup' => 'render',
    ];

    public function mount(Report $informe)
    {
        $this->report = $informe;
    }
    public function render()
    {
        $this->fechaActual = date('Y-m-d');

        return view('livewire.report.report-measurements', []);
    }

    public function addModal()
    {
        $this->reset('measurement', 'ubigeo', 'latgra', 'latmin', 'latseg', 'longra', 'lonmin', 'lonseg','imagen');
        $this->modalAdd = true;
    }

    public function save()
    {
        $this->validate();
        $this->latitud = $this->latgra . '°' . $this->latmin . "'" . $this->latseg . '"' . ' S';
        $this->longitud = $this->longra . '°' . $this->lonmin . "'" . $this->lonseg . '"' . ' W';
        if (isset($this->measurement->id)) {
            $this->measurement->save();
        } else {
            $lat = $this->latgra . $this->latmin . $this->latseg;
            $log = $this->longra . $this->lonmin . $this->lonseg;

            $url = $this->imagen->store('RNI' . '/' . $this->report->id);     

            Measurement::create([
                'ubicacion' => Str::upper($this->measurement['ubicacion']),
                'latitud' => $this->latitud,
                'latgra' => $this->latgra,
                'latmin' => $this->latmin,
                'latseg' => $this->latseg,
                'longitud' => $this->longitud,
                'longra' => $this->longra,
                'longmin' => $this->lonmin,
                'longseg' => $this->lonseg,
                'maps' => 'https://www.google.com/maps/place/' . $this->latitud . ' ' . $this->longitud,
                'rni' => $this->measurement['rni'],
                'fecha' => $this->measurement['fecha'],
                'imagen' => $url,
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
        $url = str_replace('storage', 'public', $measurement->imagen);
        Storage::delete($url);

        $measurement->delete();
        $this->modalDel = false;
        $this->emit('measurementSup');
    }

    public function edit(Measurement $measurement)
    {
        $this->measurement = $measurement;

        $this->latitud = $this->measurement->latitud;
        $this->longitud = $this->measurement->longitud;

        $this->latgra = $this->measurement->latgra;
        $this->latmin = $this->measurement->latmin;
        $this->latseg = $this->measurement->latseg;

        $this->longra = $this->measurement->longra;
        $this->lonmin = $this->measurement->longmin;
        $this->lonseg = $this->measurement->longseg;

        $this->latitud = $this->latgra . '°' . $this->latmin . "'" . $this->latseg . '"' . ' S';
        $this->longitud = $this->longra . '°' . $this->lonmin . "'" . $this->lonseg . '"' . ' W';
        $this->ubigeo = $this->measurement->ubigee->id;
        $this->imagen = $this->measurement->imagen;
        $this->modalAdd = true;
    }
    public function openModalImage(Measurement $measurement)
    {
        $this->measurement = $measurement;
        $this->openimagen =  $this->measurement;

        $this->modalImagen = true;

    }
}
