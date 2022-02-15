<?php

namespace App\Http\Livewire\Commission;

use App\Models\Commission;
use App\Models\Estation;
use Livewire\Component;
use Livewire\WithPagination;

class CommissionEstations extends Component
{
    use WithPagination;
    public $commission;
    public $search = '';
    public $ubigeo = '';
    public $selectedEstation;

    public $modalAdd = false;
    public $modalDel = false;

    public function mount(Commission $commission)
    {
        $this->commission = $commission;
    }

    protected $listeners = ['estationAttach' => 'render',
                            'estationDetach' => 'render',];
                            
    public function render()
    {
        $estations = Estation::where('name', 'LIKE', '%'.$this->search.'%' )
                    ->where('ubigeo_id','LIKE','%'.$this->ubigeo.'%')
                    ->paginate(7);

        return view(
            'livewire.commission.commission-estations',
            [
                'estations' => $estations,
            ]
        );
    }

    public function addEstacioCommission()
    {
        $this->modalAdd = true;
    }

    public function addEstacion(Estation $estation)
    {
        $estation->commissions()->attach($this->commission->id);
        $this->modalAdd = false;
        $this->emit('estationAttach');
    } 

    public function delEstacion(Estation $estation)
    {
        $estation->commissions()->detach($this->commission->id);
        $this->modalDel = false;
        $this->emit('estationDetach');
    } 

    public function mostrarDel($id)
    {
        $this->modalDel = $id;
    }
}
