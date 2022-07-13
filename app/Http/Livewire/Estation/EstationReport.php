<?php

namespace App\Http\Livewire\Estation;

use App\Models\Commission;
use App\Models\Estation;
use Livewire\Component;
use Livewire\WithPagination;

class EstationReport extends Component
{   
    use WithPagination;
    public $estation;
    public $mes = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    public $anho =2022;

    public function mount(Estation $estation)
    {
        $this->estation = $estation;
    }
    
    public function render()
    {
       $commissions = Estation::find($this->estation->id)
                    ->commissions()
                    ->where('tipo','MANTENIMIENTO')
                    ->where('estado','REALIZDO')
                    ->paginate(10);
        return view('livewire.estation.estation-report',[
            'commissions' => $commissions,
        ]);
    }
}
