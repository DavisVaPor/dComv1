<?php

namespace App\Http\Livewire\Mantenimiento;

use App\Models\Acta;
use App\Models\Activity;
use App\Models\Mantenimient;
use Livewire\Component;
use Livewire\WithPagination;

class Mantenimients extends Component
{
    use WithPagination;
    public $search = '';
    public $tipo;
    public $detalle = false;
    public $modalImagen = false;
    public $modalInfo = false;
    public $mantenimient; 
    public $activity; 
    public $visualizarActa; 


    public function render()
    {

        $mantenimients = Mantenimient::where('tipo','LIKE','%'.$this->tipo.'%')
                                    ->latest('id')->paginate(20);
        
        return view('livewire.mantenimiento.mantenimients',[
            'mantenimients' => $mantenimients,
        ]);

    }

    public function detalle(Mantenimient $id) {
        $this->mantenimient = $id;
        $this->detalle = true;
    }

    public function openModalImage(Activity $actividad){
        $this->activity = $actividad;
        $this->modalImagen = true;
    }

    public function infoActa(Acta $acta) {
        $this->visualizarActa =  $acta;
        $this->modalInfo = true;
    }
}
