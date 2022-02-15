<?php

namespace App\Http\Livewire\Commission;

use App\Models\Article;
use App\Models\Commission;
use Livewire\Component;

class CommissionArticles extends Component
{
    public $commission;
    public $search ='';
    public $searchserie;
    public $selectedArticle;
    public $modalAdd = false;
    public $modalDel = false;


    protected $listeners = ['articleAttach' => 'render',
                            'articleDetach' => 'render',];

    public function mount(Commission $commission)
    {
        $this->commission = $commission;
    }
    public function render()
    {
        $articles = Article::where('estation_id', '0' )
                    ->where('denominacion','LIKE','%'.$this->search.'%')
                    ->where('nserie','LIKE','%'.$this->searchserie.'%')
                    ->paginate(10);
        return view('livewire.commission.commission-articles',[
            'articles' => $articles,
        ]);
    }

    public function addModal()
    {
        $this->modalAdd = true;
        $this->reset('search','searchserie');
    }

    public function addArticle(Article $article)
    {
        $article->commissions()->attach($this->commission->id);
        $this->modalAdd = false;

        $this->emit('articleAttach');
        
    }
    
    public function delArticle(Article $article)
    {
        $article->commissions()->detach($this->commission->id);
        $this->modalDel = false;
        $this->emit('articleDetach');

    } 

    public function mostrarDel($id)
    {
        $this->modalDel = $id;
    }

}
