<?php

namespace App\Http\Livewire\Report\Article;

use App\Models\Article;
use App\Models\Estation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Retirototal extends Component

{
    public $estation;
    public $informe;
    public $fecha;
    public $fechaActual;
    public $modalDel = false;

    protected $listeners = [
        'EquipoInstall' => 'render',
    ];

    public function mount(Estation $estation)
    {
        $this->estation = $estation;
    }
    
    public function render()
    {
        $this->fechaActual = date('Y-m-d');

        return view('livewire.report.article.retirototal');
    }

    public function Modal()
    {
        $this->reset('fecha');
        $this->modalDel = true;
    }

    public function Reubicacion() {
        $equipos = Article::where('estataion_id','LIKE',$this->estation->id);

        foreach ($equipos as $item) {
            $item->movimient()->create([
                'tipo_movimiento' => 'RETIRO',
                'fecha_move' => $this->fecha,
                'report_id' => $this->informe->id,
                'estacion_out_id' =>  $this->estation->id,
                'estacion_out_name' =>  $this->estation->name,
                'estation_id' => 1,
                'user_id' => Auth::user()->id,
            ]);
            $item->commissions()->attach($this->informe->commission->id);
        }
    }
}
