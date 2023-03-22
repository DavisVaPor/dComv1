<?php

namespace App\Http\Livewire\Mantenimiento;

use App\Models\Activity;

use Livewire\Component;
use Livewire\WithPagination;

class Mantenimients extends Component
{
    use WithPagination;
    public $search = '';
    public $tipo;

    public function render()
    {
        $activities = Activity::where('descripcion','LIKE','%'.$this->search.'%')
        ->where('tipoActivity','LIKE',$this->tipo.'%')
        ->latest('id')->paginate(15);
        
        return view('livewire.mantenimiento.mantenimients',[
            'activities' => $activities,
        ]);
    }
}
