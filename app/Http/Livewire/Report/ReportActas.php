<?php

namespace App\Http\Livewire\Report;

use App\Models\Estation;
use Illuminate\Support\Facades\Date;
use Livewire\Component;
use Livewire\WithFileUploads;


class ReportActas extends Component
{
    use WithFileUploads;
    public $informe;
    public $estation;
    public $acta;
    public $modalAdd = false;
    public $file_url;

    public $fechaActual;
    public $fechaActa;

    protected $rules = [
        'file_url' => 'required|file',
        'fechaActa' => 'required|date',
    ];

    protected $listeners = [
        'acta' => 'render',
    ];

    public function mount(Estation $estation)
    {
        $this->estation = $estation;
    }

    public function render()
    {
        $this->fechaActual = date('Y-m-d');
        return view('livewire.report.report-actas');
    }

    public function addModal()
    {
        $this->reset(['file_url', 'acta','fechaActa']);
        $this->modalAdd = true;
    }

    public function save()
    {
        $this->validate();

        $acta_url = $this->file_url->store('ActaMantenimiento' . '/' . $this->estation->id . '/' . $this->informe->id . 'Acta');

        $this->informe->actas()->create([
            'name' => 'ActaMantenimiento'.'-'.$this->estation->id.'-'.$this->fechaActa,
            'fecha' => $this->fechaActa,
            'estation_id' => $this->estation->id,
            'file_url' => $acta_url,
        ]);
        $this->emit('acta');
        $this->reset(['file_url', 'acta']);
        $this->modalAdd = false;
    }
}
