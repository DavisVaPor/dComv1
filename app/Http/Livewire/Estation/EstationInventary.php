<?php

namespace App\Http\Livewire\Estation;

use App\Models\Article;
use App\Models\Estation;
use Livewire\Component;
use Livewire\WithPagination;

class EstationInventary extends Component
{
    use WithPagination;
    public $estation;
    public $system;
    public $search;


    public function mount(Estation $estation)
    {
        $this->estation = $estation;
    }

    public function render()
    {
        $articles = Article::where('estation_id',$this->estation->id)
                    ->where('denominacion','LIKE','%'.$this->search.'%')
                    ->where('system_id','LIKE','%'.$this->system.'%')
                    ->paginate(15);
        return view('livewire.estation.estation-inventary',[
            'articles' => $articles,
        ]);
    }
}
