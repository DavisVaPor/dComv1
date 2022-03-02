<?php

namespace App\Http\Livewire\Report;

use App\Models\Article;
use App\Models\Report;
use App\Models\System;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ReportSystems extends Component
{
    public $informe;
    public $sistema;
    public $estacion;
    public $selectedArticle = '';
    public $obbArticle = '';
    public $observationArticle ='';
    public $article;
    public $modalEdit = false;
    public $modaladdEquipo = false;


    protected $rules = [
        'article.estado' => 'required',
        'obbArticle' => 'string',
    ];

    public function mount(Report $informe)
    {
        $this->informe = $informe;
    }

    protected $listeners = ['ArtEdit' => 'render',];


    public function render()
    {
        return view('livewire.report.report-systems');
    }

    public function addModal(Article $article)
    {
        $this->article = $article;
        $this->modalEdit = true;
    }
    public function updateArticle(){
        $this->validate();
        if (isset($this->article->id)) {
            $this->article->save();
        }
        if (!empty($this->obbArticle)) {
            $this->article->observations()->create([
                'detalle' => $this->obbArticle,
                'user_id' => Auth::user()->id,
             ]);
        }
        $this->obbArticle = '';
        $this->modalEdit = false;
        $this->emit('ArtEdit');
    }

    public function addArticleSystem($system)
    {
        $this->sistema = $system;
        $this->estacion = System::findOrFail($system);
        $this->modaladdEquipo = true;
    }

    public function ArticleSystem()
    {
       if ($this->selectedArticle != '') {
           $articleUpdate = Article::findOrFail($this->selectedArticle);
           $articleUpdate->system_id = $this->sistema;
           $articleUpdate->estation_id = $this->estacion->estation_id;;

           $articleUpdate->save();
       }
       $this->reset('sistema');
       $this->reset('estacion');
       $this->reset('selectedArticle');
       $this->modaladdEquipo = false;
    }
}

