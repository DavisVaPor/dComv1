<?php

namespace App\Http\Livewire\Estation;

use App\Models\Estation;
use Livewire\Component;

class EstadoUpdate extends Component
{
    public $estation;

    public $estadoOld;
    public $estado;

    public $modalStatus = false;

    protected $rules = [
        'estado' => 'required|different:estadoOld',
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
        return view('livewire.estation.estado-update');
    }

    public function editStatus()
    {
        $this->estado = $this->estation->estado;
        $this->estadoOld = $this->estation->estado;
        $this->modalStatus = true;
    }

    public function updateStatus()
    {
        $this->validate();

        $this->estation->estado = $this->estado;
        $this->estation->save();
        $this->emit('changeStatus');

        $this->modalStatus = false;
    }
}
