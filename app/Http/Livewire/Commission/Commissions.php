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
    public $searchcode = '';
    public $commission;
    public $nameCommision = 'Comisión de Servicio';
    public $estado;
    public $tipofiltro;
    public $tipo = '';
    public $mes, $anho;
    public $fechainicio, $fechafin, $periodo;

    protected $rules = [
        'nameCommision' => 'required | min:35 |max:255',
        'tipo' => 'required',
        'fechainicio' => 'required',
        'fechafin' => 'required|date|after_or_equal:fechainicio',
    ];

    public function render()
    {
        $commissions = Commission::where('name', 'LIKE', '%' . $this->search . '%')
            ->where('numero', 'LIKE', '%' . $this->searchcode . '%')
            ->where('estado', 'LIKE', '%' . $this->estado . '%')
            ->where('tipo', 'LIKE', '%' . $this->tipofiltro . '%')
            ->where('mes', 'LIKE', '%' . $this->mes . '%')
            ->where('anho', 'LIKE', '%' . $this->anho)
            ->latest('id')
            ->paginate(15);
        return view('livewire.commission.commissions', [
            'commissions' => $commissions,
        ]);
    }

    public function addCommission()
    {
        $this->reset('commission', 'nameCommision', 'tipo', 'fechainicio', 'fechafin');
        $this->modalAdd = true;
    }

    public function saveCommission()
    {
        $this->validate();

        $day = strtotime($this->fechafin) - strtotime($this->fechainicio);
        $years = floor($day / (365 * 60 * 60 * 24));
        $months = floor(($day - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
        $day = floor(($day - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));

        $ultimo = Commission::latest()->first();

        if (strftime('%Y', strtotime($ultimo->fechainicio)) != strftime('%Y', strtotime($this->fechainicio))) {
            $num = 0;
        } else {
            $num =  $ultimo->numero + 1;
        }

        $this->periodo = $day;

        if ($this->fechafin == $this->fechainicio) {
            $this->periodo = 1;
        }
        if (!isset($this->fechafin)) {
            $this->fechafin = NULL;
        }

        if (isset($this->commission->id)) {

            $this->commission->name = Str::upper($this->commission->name);
            $this->commission->tipo = $this->tipo;
            if ($this->commission->fechainicio != $this->fechainicio) {
                $this->commission->fechainicio = $this->fechainicio;
            }

            if ($this->commission->fechafin != $this->fechafin) {
                $this->commission->fechafin = $this->fechafin;
            }
            $this->commission->periodo = $this->periodo;

            $this->commission->mes = $this->meses[strftime('%m', strtotime($this->fechainicio)) - 1];

            $this->commission->save();

            $this->modalAdd = false;
        } else {
            $comi  = Commission::create([
                'name' => Str::upper($this->nameCommision),
                'numero' => $num + 1,
                'tipo' => $this->tipo,
                'fechainicio' => $this->fechainicio,
                'fechafin' => $this->fechafin,
                'periodo' => $this->periodo,
                'estado' => 'CREADA',
                'anho' =>  strftime('%Y', strtotime($this->fechainicio)),
                'mes' => $this->meses[strftime('%m', strtotime($this->fechainicio)) - 1],
            ]);

            if ($comi->tipo == 'MANTENIMIENTO') {
                $comi->objetives()->create([
                    'name' => 'CUMPLIR CON LA META DE REALIZAR MANTENIMIENTO DEL SISTEMA DE COMUNICACION'
                ]);
            }

            if ($comi->tipo == 'MEDICION') {
                $comi->objetives()->create([
                    'name' => 'CUMPLIR CON LA META SUPERVISION DE LAS TELECOMUNICACIONES'
                ]);
            }

            if ($comi->tipo == 'PROMOCION') {
                $comi->objetives()->create([
                    'name' => 'CUMPLIR CON LA META PROMOCION Y DIFUSION DE LAS TELECOMUNICACIONES'
                ]);
            }
            return redirect()->route('commision.show', $comi->id);
        }
        $this->modalAdd = false;
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
        $this->modalAdd = true;
        $this->commission = $commission;
        $this->nameCommision = $commission->name;
        $this->tipo = $commission->tipo;
        $this->fechainicio = $commission->fechainicio;
        $this->fechafin =  $commission->fechafin;
    }
}
