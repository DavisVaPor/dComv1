<?php

namespace App\Http\Livewire\Estation;

use App\Models\Article;
use App\Models\Category;
use App\Models\Estation;
use App\Models\System;
use Livewire\Component;
use Livewire\WithPagination;

class EstationInventary extends Component
{
    use WithPagination;
    public $estation;
    public $article;
    public $system;
    public $search;
    public $modalOpen = false;

    public function mount(Estation $estation)
    {
        $this->estation = $estation;
    }

    protected $rules = [
        'article.codPatrimonial' => 'required|size:12',
        'article.denominacion' => 'required',
        'article.marca' => 'required',
        'article.modelo' => 'required',
        'article.color' => 'required',
        'article.nserie' => 'required',
        'article.estado' => 'required',
        'article.category_id' => 'required',
        'article.system_id' => 'required',
    ];

    protected $listeners = [
        'articleset' => 'render',
    ];

    public function render()
    {
        $articles = Article::where('estation_id',$this->estation->id)
                    ->where('denominacion','LIKE','%'.$this->search.'%')
                    ->where('system_id','LIKE','%'.$this->system.'%')
                    ->paginate(15);
        $categories = Category::all();
        $systems = System::all();

        return view('livewire.estation.estation-inventary',[
            'articles' => $articles,
            'categories' => $categories,
            'systems' => $systems,
        ]);
    }

    function modalOpen() {
        $this->modalOpen = true;
        $this->reset('article');

    }

    public function saveArticle()
    {
        $this->validate();

        Article::create([
            'codPatrimonial' => $this->article['codPatrimonial'],
            'denominacion' => $this->article['denominacion'],
            'cantidad' => 1,
            'marca' => $this->article['marca'],
            'modelo' => $this->article['modelo'],
            'category_id' => $this->article['category_id'],
            'color' => $this->article['color'],
            'nserie' => $this->article['nserie'],
            'estado' => $this->article['estado'],
            'estation_id'=> $this->estation->id,
            'system_id' => $this->article['system_id'],
        ]);
        $this->emit('articleset');
        $this->modalOpen = false;
        $this->reset('article');
    }
}
