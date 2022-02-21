<?php

namespace App\Http\Livewire\Report;

use App\Models\Report;
use App\Models\Conclusion;
use Livewire\Component;

class ReportConclusions extends Component
{
    public $report;

    public $conclusion;

    public $modalAdd = false;
    public $modalDel = false;

    protected $rules = [
        'conclusion.description' => 'required',
    ];

    protected $listeners = ['conclusionAdd' => 'render',
                            'conclusionSup' => 'render',];

    public function mount(Report $informe)
    {
        $this->report = $informe;
    }

    public function render()
    {
        return view('livewire.report.report-conclusions');
    }

    public function addModal()
    {
        $this->reset('conclusion');
        $this->modalAdd = true;
    }

    public function delConclusion($id)
    {
        $this->reset('conclusion');
        $this->modalDel = $id;
    }

    public function saveConclusion()
    {
        $this->validate();
        if (isset($this->conclusion->id)) {
            $this->conclusion->save();
        } else {
            $conclusion = Conclusion::create([
                'description' => $this->conclusion['description'],
                'report_id' => $this->report->id,
            ]);
        }
        $this->modalAdd = false;
        $this->emit('conclusionAdd');
        $this->reset('conclusion');

    }

    public function mostrarDel($id)
    {
        $this->modalDel = $id;
    }

    public function deleteConclusion(Conclusion $conclusion)
    {
        $conclusion->delete();
        $this->modalDel = false;
        $this->emit('conclusionSup');
    }

    public function editConclusion(Conclusion $conclusion)
    {
        $this->conclusion = $conclusion;
        $this->modalAdd = true;
    }
}
