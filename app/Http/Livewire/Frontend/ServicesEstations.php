<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Estation;
use App\Models\Ubigee;
use Livewire\Component;
use Livewire\WithPagination;

class ServicesEstations extends Component
{
    use WithPagination;
    public $estation;
    public $provincia;
    public $provinciaSearch;
    public $distritoSearch;
    public $tipo;
    public $ubigeo;
    public $estado;
    public $sistema;

    

    public $search = '';
    public function render()
    {
        $estations = Estation::where('name','LIKE','%'.$this->search.'%')
                    ->where('ubigeo_id','LIKE',$this->provinciaSearch.'%')
                    ->where('tipo','LIKE',$this->tipo.'%')
                    ->where('estado','LIKE',$this->estado.'%')
                    ->where('sistema','LIKE',$this->sistema.'%')
                    ->orderBy('name','asc')
                    ->latest('id')->paginate(12);

        $ubigees = Ubigee::where('provincia',$this->provincia )->get();
        return view('livewire.frontend.services-estations',[
            'estations' => $estations,
            'ubigees' => $ubigees,
        ]);
    }
}
