<?php

namespace App\Http\Livewire\Report;

use App\Models\Report;
use Livewire\Component;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class ReportImages extends Component
{
    use WithFileUploads;

    public $report;
    public $image;
    public $imagen;
    public $selectedU;
    public $selectedE;

    public $modalAdd = false;
    public $modalDel = false;

    public function mount(Report $informe)
    {
        $this->report = $informe;
    }

    protected $listeners = ['imageAdd' => 'render',
                            'imageSup' => 'render',];

    protected $rules = [
        'image.name' => 'required',
        'imagen' => 'required|image',
    ];

    public function render()
    {
        return view('livewire.report.report-images');
    }

    public function addModal()
    {
        $this->modalAdd = true;
        $this->reset('selectedU');
        $this->reset('selectedE');
        $this->reset('image');
        $this->imagen = '';
    }

    public function delImage($id)
    {
        $this->reset('image');
        $this->imagen = '';
        $this->modalDel = $id;
    }

    public function saveImage()
    {
        $this->validate();
        if (isset($this->image->id)) {
            $this->image->save();
        } else {
            $imagen = $this->imagen->store($this->report->id.'/img');
            
            if (isset($this->selectedE)) {
                $this->report->images()->create([
                    'name' => $this->image['name'],
                    'url' => $imagen,
                    'estation_id' => $this->selectedE
                ]);
            } else {
                $this->report->images()->create([
                    'name' => $this->image['name'],
                    'url' => $imagen,
                ]);
            }
            
            $this->reset(['image','imagen']);
        }

        $this->emit('imageAdd');
        $this->modalAdd = false;
    }

    public function mostrarDel($id)
    {
        $this->modalDel = $id;
    }

    public function deleteImage(Image $image)
    {
        $url = str_replace('storage','public',$image->url);
        
        Storage::delete($url);
        $image->delete();
        $this->modalDel = false;
        $this->emit('imageSup');
    }
    
}
