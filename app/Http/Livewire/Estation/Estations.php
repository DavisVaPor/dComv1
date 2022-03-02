<?php

namespace App\Http\Livewire\Estation;

use Livewire\Component;
use App\Models\Estation;
use App\Models\Ubigee;
use Livewire\WithPagination;

class Estations extends Component
{
    use WithPagination;
    public $estation;
    public $provincia;
    public $estado;
    public $provinciaSearch;
    public $distritoSearch;
    public $tipo;
    public $ubigeo;

    public $search = '';

    public $modalAdd = false;
    public $modalDel = false;

    protected $rules = [
        'estation.name' => 'required',
        'estation.latitud' => 'required',
        'estation.longitud' => 'required',
        'estation.altitud' => 'required',
        'estation.operativo' => 'required',
        'estation.urlgooglearth' => 'required',
        'estation.tipo' => 'required',
        'estation.terreno' => 'required',
        'estation.ubigeo_id' => 'required',
    ];

    public function render()
    {
        $estations = Estation::where('name','LIKE','%'.$this->search.'%')
                    ->where('ubigeo_id','LIKE',$this->provinciaSearch.'%')
                    ->where('tipo','LIKE',$this->tipo.'%')
                    ->where('operativo','LIKE','%'.$this->estado.'%')
                    ->orderBy('name','asc')
                    ->latest('id')->paginate(6);
        
        $ubigees = Ubigee::where('provincia',$this->provincia )->get();
        return view('livewire.estation.estations',[
            'estations' => $estations,
            'ubigees' => $ubigees,
        ]);
    }

    public function addModal()
    {
        $this->modalAdd = true;
    }

    public function saveEstation()
    {
        $this->validate();
        if (isset($this->estation->id)) {
            $this->estation->save();
        } else {
            $estacion = Estation::create([
                'name' => $this->estation['name'],
                'latitud' => $this->estation['latitud'],
                'longitud' => $this->estation['longitud'],
                'altitud' => $this->estation['altitud'],
                'operativo' => $this->estation['operativo'],
                'urlgooglearth' => $this->estation['urlgooglearth'],
                'tipo' => $this->estation['tipo'],
                'terreno' => $this->estation['terreno'],
                'ubigeo_id' => $this->estation['ubigeo_id'],
            ]);
        }
        $this->modalAdd = false;
    }
}
