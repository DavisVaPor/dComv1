<?php

namespace App\Http\Livewire\Mantenimiento;

use App\Models\Activity;
use App\Models\Mantenimient;
use Livewire\Component;
use Livewire\WithPagination;

class Mantenimients extends Component
{
    use WithPagination;
    public $search = '';
    public $tipo;

    public function render()
    {

        $mantenimients = Mantenimient::where('tipo','LIKE','%'.$this->tipo.'%')
                                    ->latest('id')->paginate(15);
        
        return view('livewire.mantenimiento.mantenimients',[
            'mantenimients' => $mantenimients,
        ]);
    }
}
