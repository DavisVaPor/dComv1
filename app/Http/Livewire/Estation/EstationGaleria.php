<?php

namespace App\Http\Livewire\Estation;

use App\Models\Estation;
use Livewire\Component;

class EstationGaleria extends Component
{
    public $estation;

    public function mount(Estation $estation)
    {
        $this->estation = $estation;
    }
    public function render()
    {
        return view('livewire.estation.estation-galeria');
    }
}
