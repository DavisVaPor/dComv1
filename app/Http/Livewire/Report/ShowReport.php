<?php

namespace App\Http\Livewire\Report;

use App\Models\Commission;
use Livewire\Component;
use App\Models\Report;


class ShowReport extends Component
{
    public $report;
    public $modalPre = false;
    public $modalPen = false;
    public $modalRev = false;

    public function mount(Report $informe)
    {
        $this->report = $informe;
    }

    public function render()
    {
        return view('livewire.report.show-report');
    }

    public function mostrarPre()
    {
        $this->modalPre = true;
    }

    public function Presentar()
    {
        $presentar = Report::findOrFail($this->report->id);

        $presentar->estado = 'PRESENTADO';

        $presentar->save();

        $this->reset('report');

        $this->modalPre = false;

        return redirect()->route('informe.index');
    }

    public function mostrarPen()
    {
        $this->modalPen = true;
    }

    public function Borrador()
    {
        $presentar = Report::findOrFail($this->report->id);

        $presentar->estado = 'BORRADOR';

        $presentar->save();

        $this->reset('report');

        $this->modalPre = false;
    }

    public function mostrarRev()
    {
        $this->modalRev = true;
    }

    public function Revisar()
    {
        $revisado = Report::findOrFail($this->report->id);

        $revisado->estado = 'REVISADO';

        $revisado->save();

        $this->reset('report');

        $this->modalRev = false;

        $commision =  Commission::find($this->report->commission_id);
        $commision->estado = 'REALIZADA';
        $commision->save();

        return redirect()->route('bandeja.index');
    }

    public function regresar(){
        return redirect()->route('informe.index');
    }

}

