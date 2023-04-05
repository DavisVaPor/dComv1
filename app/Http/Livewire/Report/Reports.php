<?php

namespace App\Http\Livewire\Report;

use Livewire\Component;
use App\Models\Report;
use App\Models\Commission;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class Reports extends Component
{
    use WithPagination;
    public $modalAdd = false;
    public $modalDel = false;
    public $search = '';
    public $report;
    public $tipo;
    public $selectedCommission;
    public $estado;
    public $fechactual;
    public $asunto = 'INFORME DE ACTIVIDADES REALIZADAS ';

    protected $rules = [
        'asunto' => 'required|min:20',
        'selectedCommission' => 'required',
    ];

    public function render()
    {
        $reports = Report::where('user_id',Auth::user()->id)
                    ->where('asunto','LIKE','%'.$this->search.'%')
                    ->where('tipo','LIKE','%'.$this->tipo)
                    ->where('estado','LIKE','%'.$this->estado.'%')
                    ->latest('id')->paginate(10);

        $this->fechactual = date('Y-m-d');
        $commissions = User::find(Auth::user()->id)
                    ->commissions()
                    ->where('estado','CONFIRMADA')
                    ->orderBy('id','desc')
                    ->paginate(10);

        return view('livewire.report.reports',[
            'reports' => $reports,
            'commissions' => $commissions,
        ]);
    }

    public function addReport()
    {
        $this->reset('report','asunto','selectedCommission');
        $this->modalAdd = true;
    }

    public function saveReport()
    {
        $commission = Commission::find($this->selectedCommission);
        $tipo = $commission->tipo;

        $this->validate();
        if (isset($this->report->id)) {
            $this->report->asunto = $this->asunto;
            $this->report->commission_id =  $this->selectedCommission;
            $this->report->save();
        } else {
            $newreport = Report::create([
                'asunto' => Str::upper($this->asunto.'EN LA '.$commission->name),
                'tipo' => $tipo,
                'fechaCreacion' => $this->fechactual,
                'user_id' => Auth::user()->id,
                'estado' => 'BORRADOR',
                'commission_id' => $this->selectedCommission,
            ]);

            return redirect()->route('informe.show', $newreport->id);
        }
        
        $this->modalAdd = false;
        $this->reset('report','asunto','selectedCommission');
    }

    public function delReport($id)
    {
        $this->modalDel = $id;
    }

    public function deleteReport(Report $report)
    {
        $report->delete();
        $this->modalDel = false;
    }

    public function editReport(Report $report)
    {
        $this->report = $report;
        $this->asunto = $report->asunto;
        $this->selectedCommission = $this->report->commission->id;;
        $this->modalAdd = true;
    }
}
