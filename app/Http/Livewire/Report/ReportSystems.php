<?php

namespace App\Http\Livewire\Report;

use App\Models\Article;
use App\Models\Estation;
use App\Models\InstallationLog;
use App\Models\Report;
use App\Models\System;
use Livewire\Component;
use Livewire\WithPagination;

class ReportSystems extends Component
{
    use WithPagination;
    public $informe;
    public $estation;
    public $modalAdd = false;
    public $ubigeo = '';
    public $selectedEstation;
    public $searchEstation;
    
    protected $listeners = ['articleset' => 'render'];

    public function mount(Report $informe)
    {
        $this->informe = $informe;
    }

    public function render()
    {
        $estations = Estation::where('name', 'LIKE',$this->searchEstation.'%' )
                    ->where('ubigeo_id','LIKE',$this->ubigeo.'%')
                    ->orderBy('name','asc')
                    ->paginate(15);

        return view('livewire.report.report-systems',[
            'estations' => $estations,
        ]);
    }

    public function addModal() {
        $this->reset('searchEstation');
        $this->modalAdd = true;
    }
}

