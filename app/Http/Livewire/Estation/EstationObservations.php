<?php

namespace App\Http\Livewire\Estation;

use App\Models\Estation;
use Livewire\Component;
use Livewire\WithPagination;

class EstationObservations extends Component
{
    use WithPagination;
    public $estation;
    
    public function mount(Estation $estation)
    {
        $this->estation = $estation;
    }
    
    public function render()
    {
        return view('livewire.estation.estation-observations');
    }
}
