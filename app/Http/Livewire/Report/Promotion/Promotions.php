<?php

namespace App\Http\Livewire\Report\Promotion;

use App\Models\Livraison;
use App\Models\Merchandising;
use App\Models\Promotion;
use App\Models\Report;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\This;

class Promotions extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $report;
    public $modalAdd = false;
    public $modalDel = false;
    public $fechaActual;
    public $promotion;
    public $ubigeo;
    public $imagen;
    public $cantidad = 0;
    public $cantStock;
    public $file;
    public $merchadensy;
    public $modalMercha;
    public $livraisons;
    public $openimagen;
    public $modalImagen = false;

    protected $listeners = [
        'promotionAdd' => 'render',
        'promotionDel' => 'render',
    ];

    protected $rules = [
        'ubigeo' => 'required',
        'promotion.tema' => 'required',
        'promotion.fecha' => 'required|date',
        'promotion.descripcion' => 'required',
    ];

    public function mount(Report $informe)
    {
        $this->report = $informe;
    }

    public function render()
    {
        $merca = Merchandising::all();

        $this->livraisons = Livraison::all();

        $this->cantStock = Merchandising::find($this->merchadensy);

        $this->fechaActual = date('Y-m-d');
        return view('livewire.report.promotion.promotions', [
            'merca' => $merca,
        ]);
    }

    public function addModalPromotion()
    {
        $this->reset('promotion', 'imagen');
        $this->modalAdd = true;
    }

    public function savePromotion()
    {
        $this->validate();
        $url = null;
        if ($this->imagen) {
            $url = $this->imagen->storeAs('Promocion' . '/', 'Promo' . $this->promotion['tema'] . $this->report->id . '.png');
        }

        if (isset($this->promotion->id)) {
            $this->promotion->save();
        } else {
            $this->report->promotions()->create([
                'tema' =>  Str::upper($this->promotion['tema']),
                'descripcion' =>  Str::upper($this->promotion['descripcion']),
                'fecha' =>  $this->promotion['fecha'],
                'ubigee_id' => $this->ubigeo,
                'report_id' => $this->report->id,
                'imagen' => $url,
                //'file' => $this->file,
                'cantidad' => $this->cantidad,
            ]);
        }
        $this->emit('promotionAdd');
        $this->reset('promotion', 'imagen');
        $this->modalAdd = false;
    }

    public function editPromotion(Promotion $promotion)
    {
        $this->promotion = $promotion;
        $this->ubigeo = $promotion->ubigee_id;
        $this->modalAdd = true;
    }

    public function mostrarDelPromotion($id)
    {
        $this->modalDel = $id;
    }

    public function deletePromotion(Promotion $promotion)
    {
        if ($promotion->imagen) {
            $url = str_replace('storage', 'public', $promotion->imagen);
            Storage::delete($url);
        }

        $promotion->delete();
        $this->modalDel = false;
        $this->emit('promotionDel');
    }

    public function addModalMercha(Promotion $promotion)
    {
        $this->promotion = $promotion;
        $this->reset('merchadensy', 'cantidad');
        $this->modalMercha = true;
    }

    public function addMercha()
    {
        $this->promotion->livraisons()->create([
            'promotion_id' => $this->promotion->id,
            'merchandising_id' => $this->merchadensy,
            'cantidad' => $this->cantidad,
        ]);
        $mercapubli = Merchandising::find($this->merchadensy);
        $res = $mercapubli->stock - (int)$this->cantidad;
        $mercapubli->stock = $res;
        $mercapubli->save();

        $this->modalMercha = false;
    }

    public function eliminarEntrega(Livraison $entrega)
    {
        $merca = Merchandising::find($entrega->merchandising_id);
        $res = $merca->stock + (int)$entrega->cantidad;
        $merca->stock = $res;
        $merca->save();

        $entrega->delete();
    }

    public function openModalImage(Promotion $promotion)
    {
        $this->promotion = $promotion;
        $this->openimagen =  $this->promotion;

        $this->modalImagen = true;
    }
}
