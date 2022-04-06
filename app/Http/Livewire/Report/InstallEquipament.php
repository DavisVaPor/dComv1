<?php

namespace App\Http\Livewire\Report;

use App\Models\InstallationLog;
use App\Models\Report;
use Livewire\Component;
use Livewire\WithPagination;

class InstallEquipament extends Component
{   
    public $report;
    public $installog;
    public $modal = false;

    public function mount(Report $informe)
    {
        $this->report = $informe;
    }
    
    public function render()
    {
        return view('livewire.report.install-equipament');
    }

    public function openModal(InstallationLog $item)
    {
        $this->installog = $item;
        $this->modal = true;
    }

}
