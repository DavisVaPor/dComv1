<?php

namespace App\Http\Livewire\Report;

use App\Models\Article;
use App\Models\Estation;
use App\Models\InstallationLog;
use App\Models\Report;
use App\Models\System;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Livewire\Component;

class ReportSystems extends Component
{
    public $informe;
    public $sistema;
    public $estacion;
    public $selectedArticle;
    public $article;
    public $modalEdit = false;
    public $modaladdEquipo = false;
    public $fechainstall;
    public $sistemaadd;


    protected $rules = [
        'estacion' => 'required',
        'selectedArticle' => 'required',
        'sistemaadd' => 'required',
        'fechainstall' => 'required',
    ];
    

    public function mount(Report $informe)
    {
        $this->informe = $informe;
        $this->selectedArticle = Article::class;
    }

    protected $listeners = ['ArtAdd' => 'render',];

    public function render()
    {
        $systems = System::all();
        return view('livewire.report.report-systems',[
            'systems' => $systems,
        ]);
    }

    public function addModal(Estation $estacion)
    {
        $this->reset('estacion');
        $this->reset('sistemaadd');
        $this->reset('selectedArticle');
        $this->estacion = $estacion;
        $this->modaladdEquipo = true;
    }

    public function ArticleAdd()
    {
        $this->validate();
        $articleUpdate = Article::findOrFail($this->selectedArticle);
        $articleUpdate->system_id = $this->sistemaadd;
        $articleUpdate->estation_id = $this->estacion->id;

        $articleUpdate->installation()->create([
            'fecha_instalacion' => $this->fechainstall,
            'estation_id' => $this->estacion->id,
            'user_id' => Auth::user()->id,
            'report_id' => $this->informe->id,
        ]);

        $articleUpdate->save();

        $this->reset('sistemaadd');
        $this->reset('selectedArticle');
        $this->modaladdEquipo = false;
        $this->emit('ArtAdd');
    }
}

