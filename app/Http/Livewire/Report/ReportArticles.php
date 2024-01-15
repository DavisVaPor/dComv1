<?php

namespace App\Http\Livewire\Report;

use App\Models\Article;
use App\Models\Category;
use App\Models\Estation;
use App\Models\System;
use Livewire\Component;
use Livewire\WithPagination;

class ReportArticles extends Component
{   use WithPagination;
    public $obbArticle = '';
    public $estation ;
    public $sistema;
    public $search = '';
    public $article;
    public $informe;
    public $estado;
    public $tipo;
    public $modalOpen = false;
 
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

    protected $listeners = ['ArtAdd' => 'render',
                            'ArtEdit' => 'render',
                            'EquipoInstall' => 'render',
                            'EquipoRetiro' => 'render',
                            'movementDelete' => 'render',
                            'articleset' => 'render',];
                        
    public function mount(Estation $estation)
    {
        $this->estation = $estation;
    }
    
    public function render()
    {
        $systems = System::all();
        $categories = Category::all();
        $articles = Article::where('estation_id',$this->estation->id)
                            ->where('denominacion','LIKE', '%'.$this->search.'%')
                            ->where('system_id','LIKE', '%'.$this->sistema)
                            ->paginate(10);
        return view('livewire.report.report-articles',[
            'systems' => $systems,
            'articles' => $articles,
            'categories' => $categories,
        ]);
    } 
}
