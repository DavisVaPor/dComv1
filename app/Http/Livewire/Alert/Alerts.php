<?php

namespace App\Http\Livewire\Alert;

use App\Models\Alert;
use App\Models\Estation;
use Livewire\Component;
use Livewire\WithPagination;

class Alerts extends Component
{
    use WithPagination;
    public $alert;
    public $search;
    public $ubigeo = '';
    public $searchestation;
    public $estado;
    public $nivel;
    public $selectedEstation = '';

    public $modalAdd = false;

    protected $rules = [
        'conclusion.description' => 'required',
    ];

    public function render()
    {
        $alerts = Alert::where('description','LIKE','%'.$this->search.'%')
                        ->where('estado','LIKE','%'.$this->estado.'%')
                        ->where('nivel','LIKE','%'.$this->nivel.'%')
                        ->paginate(15);

        $estations = Estation::where('name','LIKE','%'.$this->searchestation.'%')
                            ->where('ubigeo_id','LIKE','%'.$this->ubigeo.'%')
                            ->paginate(5);

        return view('livewire.alert.alerts',[
            'alerts' => $alerts,
            'estations' => $estations
            ]
        );
    }

    public function addModal(){
        $this->modalAdd = true;
    }

    public function savealert(){
        $this->validate();
        if (isset($this->alert->id)) {
            $this->alert->save();
        } else {
            Alert::create([
                'description' => $this->alert['description'],
                'estation_id' => $this->selectedEstation,
                'nivel' => $this->alert['nivel'],
            ]);
        }
        $this->modalAdd = false;
    }
}
