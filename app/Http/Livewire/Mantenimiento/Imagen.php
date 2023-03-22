<?php

namespace App\Http\Livewire\Mantenimiento;

use App\Models\Activity;
use Livewire\Component;

class Imagen extends Component
{   
    public $image;
    public $imagen;
    public $activity;

    public $modalopen = false;

    public function mount(Activity $activity)
    {
        $this->activity = $activity;
    }

    public function render()
    {
        return view('livewire.mantenimiento.imagen');
    }

    public function addModal()
    {
        $this->modalopen = true;

    }

}
