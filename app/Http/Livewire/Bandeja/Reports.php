<?php

namespace App\Http\Livewire\Bandeja;

use Livewire\Component;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;

class Reports extends Component
{
    
    public function render()
    {
        $reports = Report::where('estado','LIKE','PRESENTADO')
                    ->latest('id')->paginate(10);
                    
        return view('livewire.bandeja.reports',[
            'reports' => $reports,
        ]);
    }
}
