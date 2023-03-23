<?php

namespace App\Http\Livewire\Requerimient;

use App\Models\Requirement;
use Livewire\Component;
use Livewire\WithPagination;

class Requerimients extends Component
{
    use WithPagination;

    public function render()
    {
        $requirements = Requirement::paginate(5);
        return view('livewire.requerimient.requerimients',[
            'requirements' => $requirements,
        ]);
    }
}
