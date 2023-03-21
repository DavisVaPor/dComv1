<?php

namespace App\Http\Livewire\Commission;

use App\Models\Commission;
use Livewire\Component;

class ShowCommission extends Component
{
    public $commission;
    public $modalConf= false;
    public $modalPen=false;
    public $modalAnu=false;
    
    public function mount(Commission $commission)
    {
        $this->commission = $commission;
    }

    protected $listeners = ['commissionPen' => 'reloadpage',
                            'commissionConfi' => 'regresar',
                            'commissionAnu' => 'regresar'];

    public function render()
    {
        return view('livewire.commission.show-commission');
    }
    
    public function reloadpage()
    {
        return redirect()->route('commision.show',[$this->commission]);
    }

    public function regresar(){
        return redirect()->route('comision.index');
    }

    public function mostarConf()
    {
       $this->modalConf = true;
    }

    public function Confirmar()
    {
        if ($this->commission->objetives->isNotEmpty()) {
            $confirmar = Commission::findOrFail($this->commission->id);

            $confirmar->estado = 'CONFIRMADA';

            $confirmar->save();

            $this->emit('commissionConfi');

            $this->modalConf = false;
        }
    }

    public function mostrarPen()
    {
       $this->modalPen = true;
    }

    public function Pendiente()
    {
        $pendiente = Commission::findOrFail($this->commission->id);

        $pendiente->estado = 'CREADA';

        $pendiente->save();
        
        $this->emit('commissionPen');

        $this->modalPen = false;
    }

    public function mostrarAnu()
    {
       $this->modalAnu = true;
    }

    public function Anular()
    {
        $anular = Commission::findOrFail($this->commission->id);

        $anular->estado = 'ANULADA';

        $anular->save();

        $this->emit('commissionAnu');

        $this->modalAnu = true;
    }
}
