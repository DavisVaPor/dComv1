<?php

namespace App\Http\Livewire\Article;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowArticles extends Component
{
    public $item;
    public $article;
    public $estado;
    public $modalEdit = false;
    public $estadoOld;
    public $descripcion;
    public $tipo;
    
    protected $listeners = [
        'addReparation' => 'render',
    ];

    protected $rules = [
        'tipo' => 'required',
        'descripcion' => 'required',
    ];

    public function mount(Article $article)
    {
        $this->article = $article;
    }

    public function render()
    {
        return view('livewire.article.show-articles');
    }

    public function addModal()
    {
        $this->estado = $this->article->estado;
        $this->estadoOld = ''. $this->article->estado;
        $this->modalEdit = true;
    }

    public function reparation()
    {
        $this->validate();
        $cambios='';
        if ($this->estadoOld === $this->article->estado ) {
            $cambios = ''.$this->estado;
        } else {
            $cambios = $this->estadoOld. ' X ' . $this->estado;
        }

        $cambios = $this->estadoOld . ' X ' . $this->estado;
        $this->article->manintenance()->create([
            'descripcion' => $this->descripcion,
            'cambios' => $cambios,
            'tipo' => $this->tipo,
            'user_id' => Auth::user()->id,
        ]);
        $this->article->estado = $this->estado;
        $this->article->save();
        $this->descripcion = '';
        $this->estadoOld = '';
        $this->emit('addReparation');
        $this->reset( 'tipo', 'estado','descripcion','tipo');
        $this->modalEdit = false;
        
    }
}
