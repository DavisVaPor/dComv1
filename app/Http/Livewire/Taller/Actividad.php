<?php

namespace App\Http\Livewire\Taller;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class Actividad extends Component
{
    use WithPagination;
    
    public function render()
    {
        
        $articles = Article::where('estation_id','LIKE',1)->paginate(25);
        return view('livewire.taller.actividad',[
            'articles' => $articles,
        ]);
    }
}
