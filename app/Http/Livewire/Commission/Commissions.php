<?php

namespace App\Http\Livewire\Commission;

use App\Models\Commission;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class Commissions extends Component
{
    public $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

    use WithPagination;
    public $modalAdd = false;
    public $modalDel = false;
    public $search = '';
    public $commission;
    public $estado;
    public $tipofiltro;
    public $tipo = '';
    public $mes, $anho;
    public $fechainicio, $fechafin, $periodo;

    protected $rules = [
        'commission.name' => 'required | min:35 |max:255',
        'tipo' => 'required',
        'fechainicio' => 'required',
        'fechafin' => 'required',
    ];

    public function render()
    {
        $commissions = Commission::where('name', 'LIKE', '%' . $this->search . '%')
            ->where('estado', 'LIKE', '%' . $this->estado . '%')
            ->where('tipo', 'LIKE', '%' . $this->tipofiltro . '%')
            ->where('mes', 'LIKE', '%' . $this->mes . '%')
            ->where('anho', 'LIKE', '%' . $this->anho . '%')
            ->latest('id')
            ->paginate(10);
        return view('livewire.commission.commissions', [
            'commissions' => $commissions,
        ]);
    }

    public function addCommission()
    {
        $this->reset('commission', 'tipo', 'fechainicio', 'fechafin');
        $this->modalAdd = true;
    }

    public function saveCommission()
    {
         $this->validate();
         
        $day = strtotime($this->fechafin) - strtotime($this->fechainicio);
        $years = floor($day / (365 * 60 * 60 * 24));
        $months = floor(($day - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
        $day = floor(($day - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));

        $this->periodo = $day;
       
        $mesconver = Str::between($this->fechainicio, '-', '-');
        if ($this->fechafin == $this->fechainicio){
            $this->periodo = 1;
        }
        if (!isset($this->fechafin)) {
            $this->fechafin = NULL;
        }
        if (isset($this->commission->id)) {
            $this->commission->name = Str::upper($this->commission->name);
            $this->commission->tipo = $this->tipo;
            $this->commission->fechainicio = $this->fechainicio;
            $this->commission->fechafin = $this->fechafin;
            if ($this->fechafin == $this->fechainicio){
                $this->periodo = 1;
            }
            $this->commission->periodo = $this->periodo;
            $this->commission->save();
        } else {
            $comi  = Commission::create([
                'name' => Str::upper($this->commission['name']),
                'tipo' => $this->tipo,
                'fechainicio' => $this->fechainicio,
                'fechafin' => $this->fechafin,
                'periodo' => $this->periodo,
                'estado' => 'CREADA',
                'anho' =>  date('Y'),
                'mes' => $this->meses[date($mesconver) - 1],
            ]);
        }
        $this->modalAdd = false;

        return redirect()->route('commision.show', $comi->id);
    }
    public function delCommission($id)
    {
        $this->modalDel = $id;
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
        $this->fechainicio = $commission->fechainicio;
        $this->fechafin =  $commission->fechafin;
        $this->modalAdd = true;
    }
}
