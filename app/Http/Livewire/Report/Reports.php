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
    public $selectedCommission;
    public $estado;

    protected $rules = [
        'report.asunto' => 'required|min:20',
        'selectedCommission' => 'required',
        'report.fechaCreacion' => 'required'
    ];

    public function render()
    {
        $reports = Report::where('user_id',Auth::user()->id)
                ->where('asunto','LIKE','%'.$this->search.'%')
                ->where('estado','LIKE','%'.$this->estado.'%')
                ->latest('id')->paginate(10);
        $users = User::with('commissions')
                    ->where('id',Auth::user()->id)
                    ->paginate(4);

        return view('livewire.report.reports',[
            'reports' => $reports,
            'users' => $users,
        ]);
    }

    public function addReport()
    {
        $this->reset('report');
        $this->modalAdd = true;
    }

    public function saveReport()
    {
        $commission = Commission::find($this->selectedCommission);
        $tipo = $commission->tipo;

        $this->validate();
        if (isset($this->report->id)) {
            $this->report->commission_id =  $this->selectedCommission;
            $this->report->save();
        } else {
            Report::create([
                'asunto' => Str::upper($this->report['asunto']),
                'tipo' => $tipo,
                'fechaCreacion' => $this->report['fechaCreacion'],
                'user_id' => Auth::user()->id,
                'estado' => 'BORRADOR',
                'commission_id' => $this->selectedCommission,
            ]);
        }
        $this->modalAdd = false;
        $this->reset('report','selectedCommission');
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
        $this->selectedCommission = $this->report->commission->id;;
        $this->modalAdd = true;
    }
}
