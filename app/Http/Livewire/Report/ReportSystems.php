<?php

namespace App\Http\Livewire\Report;

use App\Models\Article;
use App\Models\Estation;
use App\Models\InstallationLog;
use App\Models\Report;
use App\Models\System;
use Livewire\Component;

class ReportSystems extends Component
{
    public $informe;
    public $estation;
    public $modalEstatus = false;
    public function mount(Report $informe)
    {
        $this->informe = $informe;
    }

    protected $listeners = [
        'changeStatus' => 'render',
    ];

    public function render()
    {
        return view('livewire.report.report-systems',[

        ]);
    }

    public function editStatus(Estation $estation){
        
        $this->modalEstatus = true;
        $this->$estation = $estation;
        
    }

}

