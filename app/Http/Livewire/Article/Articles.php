<?php

namespace App\Http\Livewire\Article;

use App\Http\Livewire\Estation\Estations;
use App\Models\Article;
use App\Models\Category;
use App\Models\Estation;
use App\Models\System;
use Livewire\Component;
use Livewire\WithPagination;

class Articles extends Component
{
    use WithPagination;
    public $search = '';
    public $searchserie = '';
    public $estation;
    public $all = '*';
    public $modalAdd = false;
    public $article;


    protected $rules = [
        'article.codPatrimonial' => 'required',
        'article.denominacion' => 'required',
        'article.marca' => 'required',
        'article.modelo' => 'required',
        'article.color' => 'required',
        'article.nserie' => 'required',
        'article.estado' => 'required',
        'article.category_id' => 'required',
        'article.system_id' => 'required',
    ];


    public function render()
    {
        $articles = Article::where('denominacion','LIKE','%'.$this->search.'%')
                    ->where('nserie','LIKE','%'.$this->searchserie.'%')
                    ->where('estation_id','LIKE','%'.$this->estation)
                    ->latest('denominacion')
                    ->paginate(13);

        $estations = Estation::all();

        $categories = Category::all();

        $systems = System::all();

        return view('livewire.article.articles',[
            'articles' => $articles,
            'categories' => $categories,
            'estations' => $estations,
            'systems' => $systems,
        ]);
    }

    public function add()
    {
        $this->modalAdd = true;
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
            'estation_id'=> 1,
            'system_id' => $this->article['system_id'],
        ]);
        
        $this->modalAdd = false;
        $this->reset('article');
    }

    public function edit(Article $article)
    {
        $this->article = $article;
        $this->modalAdd = true;

    }
}
