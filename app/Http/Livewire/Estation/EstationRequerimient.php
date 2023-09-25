<?php

namespace App\Http\Livewire\Estation;

use App\Models\Estation;
use App\Models\Requirement;
use Livewire\Component;

class EstationRequerimient extends Component
{   public $estation;
    public $requirement;
    public $equiponame;
    public $modalInfo = false;

    public function mount(Estation $estation)
    {
        $this->estation = $estation;
    }

    public function render()
    {
        return view('livewire.estation.estation-requerimient');
    }

    public function info(Requirement $requirement)
    {
        $this->requirement = $requirement;
        $this->equiponame = $requirement->equipment;
        $this->modalInfo = true;
    }
}
