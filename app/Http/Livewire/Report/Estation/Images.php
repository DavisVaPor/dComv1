<?php

namespace App\Http\Livewire\Report\Estation;

use App\Models\Estation;
use Livewire\Component;

class Images extends Component
{

    public $estation;
    public $informe;
    
    public function mount(Estation $estation)
    {
        $this->estation = $estation;
    }
    
    public function render()
    {
        return view('livewire.report.estation.images');
    }
}
