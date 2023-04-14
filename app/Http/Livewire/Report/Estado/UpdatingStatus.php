<?php

namespace App\Http\Livewire\Report\Estado;

use App\Models\Estation;
use Illuminate\Auth\Events\Validated;
use Livewire\Component;

class UpdatingStatus extends Component
{
    public $informe;
    public $estation;

    public $estado;

    public $modalStatus = false;

    protected $rules = [
        'estado' => 'required',
    ];

    protected $listeners = [
        'changeStatus' => 'render',
    ];

    public function mount(Estation $estation)
    {
        $this->estation = $estation;
    }

    public function render()
    {
        return view('livewire.report.estado.updating-status');
    }

    public function editStatus()
    {
        $this->reset('estado');
        $this->estado = $this->estation->estado;
        $this->modalStatus = true;
    }

    public function updateStatus()
    {
        $this->validate();
        if ($this->estation->estado = !$this->estado) {
            $this->estado = $this->estation->estado;
            $this->estation->save();
        }

        $this->emit('changeStatus');
        $this->modalStatus = false;
    }
}
