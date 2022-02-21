<?php

namespace App\Http\Livewire\Commission;

use App\Models\Commission;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class Commissions extends Component
{
    public $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

    use WithPagination;
    public $modalAdd = false;
    public $modalDel = false;
    public $search = '';
    public $commission;
    public $estado;
    public $tipofiltro;
    public $tipo = '';
    public $mes, $anho;

    protected $rules = [
        'commission.name' => 'required',
        'tipo' => 'required',
        'commission.fechainicio' => 'required',
        'commission.fechafin' => 'required',
    ];

    protected $listeners = [];

    public function render()
    {
        $commissions = Commission::where('name','LIKE','%'.$this->search.'%')
                        ->where('estado','LIKE','%'.$this->estado.'%')
                        ->where('tipo','LIKE','%'.$this->tipofiltro.'%')
                        ->where('mes','LIKE','%'.$this->mes.'%')
                        ->where('anho','LIKE','%'.$this->anho.'%')
                        ->latest('id')
                        ->paginate(10);
        return view('livewire.commission.commissions', [
            'commissions' => $commissions,
        ]);
   }

    public function addCommission()
    {
        $this->reset('commission','tipo');
        $this->modalAdd = true;
    }

    public function delCommission($id)
    {
        $this->modalDel = $id;
    }

    public function getDato(String $dato)
    {
        $mesconver = Str::between($dato,'-','-');
        $anhoconver = Str::before($dato,'-');
        $diaconver = Str::after($dato,$anhoconver.'-'.$mesconver.'-');

        return $diaconver.'-'.$mesconver.'-'.$anhoconver;
    }

    public function saveCommission()
    {
        $this->validate();
        $mesconver = Str::between($this->commission['fechainicio'],'-','-');


        if (!isset($this->commission['fechafin'])) {
            $this->commission['fechafin'] = NULL;
        }
        if (isset($this->commission->id)) {
            $this->commission->name = Str::upper($this->commission->name);
            $this->commission->tipo = $this->tipo;
            $this->commission->save();
        } else {
            Commission::create([
                'name' => Str::upper($this->commission['name']),
                'tipo' => $this->tipo,
                'fechainicio' => $this->commission['fechainicio'],
                'fechafin' => $this->commission['fechafin'],
                'estado' => 'CREADA',
                'anho' =>  date('Y'),
                'mes' => $this->meses[date($mesconver)-1], 
            ]);
        }        
        $this->reset('tipo');
        $this->reset('commission');
        
        $this->modalAdd = false;
        $ultimo = Commission::latest('id')->first();
        return redirect()->route('commision.show',$ultimo->id);
    }

    public function deleteCommission(Commission $commission)
    {
        $commission->delete();
        $this->modalDel = false;
    }

    public function editCommission(Commission $commission)
    {
        $this->commission = $commission;
        $this->tipo = $commission->tipo;
        $this->modalAdd = true;
    }
}