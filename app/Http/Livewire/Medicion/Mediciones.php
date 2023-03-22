<?php

namespace App\Http\Livewire\Medicion;

use App\Models\Measurement;
use Livewire\Component;
use Livewire\WithPagination;

class Mediciones extends Component
{
    use WithPagination;
    public function render()
    {
        $mediciones = Measurement::latest('id')->paginate(15);
        return view('livewire.medicion.mediciones',[
            'mediciones'  => $mediciones,
        ]);
    }
}
