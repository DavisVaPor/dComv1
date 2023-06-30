<?php

namespace App\Http\Livewire\Medicion;

use App\Models\Measurement;
use Livewire\Component;
use Livewire\WithPagination;

class Mediciones extends Component
{
    public $measurement;
    public $openimagen;
    public $modalImagen = false;
    use WithPagination;
    public function render()
    {
        $mediciones = Measurement::latest('id')->paginate(15);
        return view('livewire.medicion.mediciones',[
            'mediciones'  => $mediciones,
        ]);
    }

    public function openModalImage(Measurement $measurement)
    {
        $this->measurement = $measurement;
        $this->openimagen =  $this->measurement;

        $this->modalImagen = true;

    }
}
