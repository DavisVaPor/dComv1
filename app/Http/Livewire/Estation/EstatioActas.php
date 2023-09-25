<?php

namespace App\Http\Livewire\Estation;

use App\Models\Acta;
use App\Models\Estation;
use Livewire\Component;

class EstatioActas extends Component
{
    public $estation;
    public $visualizarActa;
    public $modalInfo = false;

    public function mount(Estation $estation)
    {
        $this->estation = $estation;
    }
    public function render()
    {
        return view('livewire.estation.estatio-actas');
    }

    public function infoActa(Acta $acta) {
        $this->visualizarActa =  $acta;
        $this->modalInfo = true;
    }
}
