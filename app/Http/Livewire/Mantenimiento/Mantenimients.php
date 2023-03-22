<?php

namespace App\Http\Livewire\Mantenimiento;

use App\Models\Activity;

use Livewire\Component;
use Livewire\WithPagination;

class Mantenimients extends Component
{
    use WithPagination;
    public $modalopen = false;
    public $activity;

    public function render()
    {
        $activities = Activity::latest('id')->paginate(15);
        
        
        // ::where('name','LIKE','%'.$this->search.'%')
        // ->where('ubigeo_id','LIKE',$this->provinciaSearch.'%')
        // ->where('tipo','LIKE',$this->tipo.'%')
        // ->where('estado','LIKE',$this->estado.'%')
        // ->where('sistema','LIKE',$this->sistema.'%')
        // ->orderBy('name','asc')
        // ->latest('id')->paginate(12);
        return view('livewire.mantenimiento.mantenimients',[
            'activities' => $activities,
        ]);
    }

    public function modalview($activity){
        $this->modalopen = true;
        $this->activity = $activity;
    }
}
