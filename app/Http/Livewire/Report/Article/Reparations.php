<?php

namespace App\Http\Livewire\Report\Article;

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
        return view('livewire.report.article.reparations');
    }
}
