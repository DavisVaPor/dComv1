<?php

namespace App\Http\Livewire\Report\Article;

use App\Models\EquipamentMaintenance;
use App\Models\Estation;
use Livewire\Component;

class Reparations extends Component
{
    public $estation;
    public $informe;

    public function mount(Estation $estation)
    {
        $this->estation = $estation;
    }
    
    public function render()
    {
        $manintenances = EquipamentMaintenance::where('report_id',$this->informe->id)
                                                ->get();
        return view('livewire.report.article.reparations',[
            'manintenances' => $manintenances,
        ]);
    }
}
