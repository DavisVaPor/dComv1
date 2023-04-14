<?php

namespace App\Http\Livewire\Report\Servicio;

use App\Models\Estation;
use App\Models\Mantenimient;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Mantenimiento extends Component
{
    public $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

    public $informe;
    public $estation;

    public $manteniemient;
    public $tipoMantenimiento;
    public $fechaMantenimiento;

    public $modalServicio = false;

    protected $rules = [
        'tipoMantenimiento' => 'required',
        'fechaMantenimiento' => 'required',
    ];

    protected $listeners = [
        'mantenimientoadd' => 'render',
    ];

    public function mount(Estation $estation)
    {
        $this->estation = $estation;
    }

    public function render()
    {
        $manteniemients = Mantenimient::all();
        return view('livewire.report.servicio.mantenimiento',
        [
            'mantenimients' => $manteniemients,
        ]
    );
    }

    public function saveMantenimiento()
    {
        $this->validate();
        if (isset($this->manteniemient)) {
            $this->manteniemient->tipo = $this->tipoMantenimiento;
            $this->manteniemient->fechaMantenimiento = $this->fechaMantenimiento;
            $this->manteniemient->save();
        }else{
            $this->informe->mantenimient()->create([
                'tipo' => $this->tipoMantenimiento,
                'estation_id' => $this->estation->id,
                'user_id' => Auth::user()->id,
                'fechaMantenimiento' => $this->fechaMantenimiento,
                'mes' => $this->meses[strftime('%m', strtotime($this->fechaMantenimiento))-1],
                'anho' => strftime('%Y', strtotime($this->fechaMantenimiento)),
            ]);
        } 
        $this->emit('mantenimientoadd');
        $this->modalServicio = false;
    }

    public function addModalServicio()
    {
        $this->reset('tipoMantenimiento', 'fechaMantenimiento', 'manteniemient');
        $this->modalServicio = true;
    }

    public function editModalServicio(Mantenimient $manteniemient)
    {
        $this->manteniemient = $manteniemient;
        $this->tipoMantenimiento = $manteniemient->tipo;
        $this->fechaMantenimiento = $manteniemient->fechaMantenimiento;
        $this->modalServicio = true;
    }
}
