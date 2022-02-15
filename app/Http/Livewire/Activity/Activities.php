<?php

namespace App\Http\Livewire\Activity;

use App\Models\Activity;
use Livewire\Component;
use Livewire\WithPagination;

class Activities extends Component
{
    use WithPagination;
    public $search;
    public $tipo;

    public function render()
    {
        $activities = Activity::where('descripcion','LIKE','%'. $this->search.'%')
                        ->where('tipoActivity','LIKE','%'. $this->tipo.'%')     
                        ->latest('id')
                        ->paginate(10);
        return view('livewire.activity.activities',[
            'activities' => $activities,
        ]);
    }
}