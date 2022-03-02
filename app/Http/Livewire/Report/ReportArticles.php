<?php

namespace App\Http\Livewire\Report;

use App\Models\Article;
use App\Models\Estation;
use App\Models\System;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ReportArticles extends Component
{   
    public $selectedArticle = '';
    public $obbArticle = '';
    public $estation;
    public $sistemas;
    public $search = '';
    public $modalEdit = false;
    public $article;
    public $estadoOld = '';
 
    protected $rules = [
        'article.estado' => 'required',
        'obbArticle' => 'string',
    ]; 
    
    public function mount(Estation $estation)
    {
        $this->estation = $estation;
    }
    
    public function render()
    {
        $systems = System::all();
        $articles = Article::where('estation_id',$this->estation->id)
                            ->where('denominacion','LIKE', '%'.$this->search.'%')
                            ->get();
        return view('livewire.report.report-articles',[
            'systems' => $systems,
            'articles' => $articles,
        ]);
    }

    public function addModal(Article $article)
    {
        $this->article = $article;
        $this->estadoOld = ''.$article->estado;
        $this->modalEdit = true;
    }
    public function updateArticle(){
        $this->validate();
        if (isset($this->article->id)) {
            $this->article->save();
        }
        if (!empty($this->obbArticle)) {
            $this->article->manintenance()->create([
                'descripcion' => $this->obbArticle,
                'cambios' =>  $this->estadoOld. ' X ' . $this->article->estado,
                'user_id' => Auth::user()->id,
             ]);
        }
        $this->obbArticle = '';
        $this->estadoOld = '';
        $this->modalEdit = false;
        $this->emit('ArtEdit');
    }
}
