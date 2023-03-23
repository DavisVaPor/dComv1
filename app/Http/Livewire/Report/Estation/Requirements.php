<?php

namespace App\Http\Livewire\Report\Estation;

use App\Models\Catalog;
use App\Models\Estation;
use App\Models\Requirement;
use Livewire\Component;
use Livewire\WithPagination;

class Requirements extends Component
{
    use WithPagination;
    public $estation;
    public $informe;
    public $requirement;
    public $modalAdd = false;
    public $modalDel = false;
    public $modalInfo = false;
    public $submodalAdd = false;
    public $equipoSelect;
    public $equiponame;
    public $searchEquipo = '';

    public function mount(Estation $estation)
    {
        $this->estation = $estation;
    }

    public function updatingsearchEquipo()
    {
        $this->resetPage();
    }

    protected $rules = [
        'equiponame' => 'required',
        'requirement.cantidad' => 'required',
        'requirement.descripcion' => 'required',
    ];

    protected $listeners = [
        'requerimentAdd' => 'render',
        'requirementSup' => 'render'
    ];

    public function render()
    {
        $equipos = Catalog::where('name', 'LIKE', '%' . $this->searchEquipo . '%')
            ->orderby('name','ASC')
            ->paginate(25);

        $requirements =  Requirement::where('report_id', $this->informe->id)
                        ->where('estation_id', $this->estation->id) 
                        ->paginate(5);

        return view('livewire.report.estation.requirements', [
            'equipos' => $equipos,
            'requirements' => $requirements,
        ]);
    }

    public function addModal()
    {
        $this->reset('equiponame', 'requirement');
        $this->modalAdd = true;
    }

    public function addsubModal()
    {
        $this->reset('equipoSelect');
        $this->searchEquipo = '';
        $this->submodalAdd = true;
    }

    public function addEquipo()
    {
        $this->equiponame = Catalog::findorFail($this->equipoSelect);
        $this->submodalAdd = false;
    }

    public function registrarRq()
    {
        $this->validate();
        if (isset($this->requirement->id)) {
            $this->requirement->equipment_id = $this->equiponame->id;
            $this->requirement->save();
        } else {
            $this->informe->requirements()->create([
                'estation_id' => $this->estation->id,
                'equipment_id' => $this->equiponame->id,
                'cantidad' => $this->requirement['cantidad'],
                'descripcion' => $this->requirement['descripcion'],
            ]);
        }
        $this->modalAdd = false;
        $this->emit('requerimentAdd');
    }

    public function mostrarDel($id)
    {
        $this->modalDel = $id;
    }

    public function delete(Requirement $requirement)
    {
        $requirement->delete();
        $this->modalDel = false;
        $this->emit('requirementSup');
    }

    public function edit(Requirement $requirement)
    {
        $this->requirement = $requirement;
        $this->equiponame = $requirement->equipment;
        $this->modalAdd = true;
    }

    public function info(Requirement $requirement)
    {
        $this->requirement = $requirement;
        $this->equiponame = $requirement->equipment;
        $this->modalInfo = true;
    }
}
