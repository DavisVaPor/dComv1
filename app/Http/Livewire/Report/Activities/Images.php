<?php

namespace App\Http\Livewire\Report\Activities;

use App\Models\Activity;
use Livewire\Component;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;


class Images extends Component
{
    use WithFileUploads;

    public $informe;
    public $estation;
    public $image;
    public $imagen;
    public $activity;

    public $modalAdd = false;
    public $subModalAdd = false;
    public $modalDel = false;

    protected $rules = [
        'imagen' => 'required|image',
    ];

    protected $listeners = [
        'imageSave' => 'render',
        'imageSup' => 'render',
    ];

    public function mount(Activity $activity)
    {
        $this->activity = $activity;
    }

    public function render()
    {
        return view('livewire.report.activities.images');
    }

    public function addModalImage()
    {
        $this->modalAdd = true;

    }

    public function addSubModalImage ()
    {
        $this->subModalAdd = true;
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
            $imagen = $this->imagen->store($this->informe->id.$this->estation->id.'/img');
            
                $this->activity->images()->create([
                    'name' => 'estation'.'-'.$this->estation->id.$this->estation->name,
                    'url' => $imagen,
                ]);

            $this->reset(['image','imagen']);
        }
        $this->subModalAdd = false;
        $this->emit('imageSave');
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
