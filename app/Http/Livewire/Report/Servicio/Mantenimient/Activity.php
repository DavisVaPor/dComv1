<?php

namespace App\Http\Livewire\Report\Servicio\Mantenimient;

use App\Models\Mantenimient;
use Livewire\Component;

class Activity extends Component
{
    public $mantenimient;
    public function mount(Mantenimient $mantenimient)
    {
        $this->mantenimient = $mantenimient;
    }

    public function render()
    {
        return view('livewire.report.servicio.mantenimient.activity');
    }
}
