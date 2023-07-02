<?php

namespace App\Http\Livewire\Estation;

use App\Models\Activity;
use App\Models\Commission;
use App\Models\Estation;
use App\Models\Mantenimient;
use Livewire\Component;
use Livewire\WithPagination;

class EstationReport extends Component
{   
    use WithPagination;
    public $estation;
    public $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    public $mes;
    public $anho =2023;
    public $detalle = false;
    public $modalImagen = false;
    public $mantenimient; 
    public $activity; 

    public function mount(Estation $estation)
    {
        $this->estation = $estation;
    }
    
    public function render()
    {
        $mantenimientos = Mantenimient::where('estation_id','LIKE',$this->estation->id)
                            ->where('mes','LIKE','%'.$this->mes.'%')
                            ->where('anho','LIKE','%'.$this->anho.'%')
                            ->get();

        return view('livewire.estation.estation-report',[
            'mantenimientos' => $mantenimientos,
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
}
