<?php

namespace App\Http\Livewire\Promotion;

use App\Models\Livraison;
use App\Models\Promotion;
use Livewire\Component;

class Promotions extends Component
{
    public $promotion;
    public $openimagen;
    public $modalMercha = false;
    public $livraisons;

    public $modalImagen = false;
    public function render()
    {
        $promotion = Promotion::all();
        $this->livraisons = Livraison::all();

        return view('livewire.promotion.promotions',[
            'promotions' => $promotion,
        ]);
    }

    public function openModalImage(Promotion $promotion)
    {
        $this->promotion = $promotion;
        $this->openimagen =  $this->promotion;

        $this->modalImagen = true;
    }

    public function addModalMercha(Promotion $promotion){
        $this->promotion = $promotion;
        $this->modalMercha = true;
    }
}
