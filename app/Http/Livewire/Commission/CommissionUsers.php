<?php

namespace App\Http\Livewire\Commission;

use App\Models\Commission;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class CommissionUsers extends Component
{
    use WithPagination;
    public $commission;
    public $selectedUser;

    public $modalAdd = false;
    public $modalDel = false;

    protected $listeners = ['userAttach' => 'render',
                            'userDetach' => 'render',];

    public function mount(Commission $commission)
    {
        $this->commission = $commission;
    }

    public function render()
    {
        $users = User::all();
        return view('livewire.commission.commission-users',
        [
            'users' => $users,
        ]);
    }

    public function addUserCommission()
    {
        $this->modalAdd = true;
    }

    public function addUser(User $user)
    {
        $this->commission->users()->attach($this->selectedUser);
        //$user->commissions()->attach($this->commission->id);
        $this->modalAdd = false;
        $this->emit('userAttach');
    }
    
    public function delEstacion(User $user)
    {
        $user->commissions()->detach($this->commission->id);
        $this->modalDel = false;
        $this->emit('userDetach');
    } 

    public function mostrarDel($id)
    {
        $this->modalDel = $id;
    }
}
