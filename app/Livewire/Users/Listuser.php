<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class Listuser extends Component
{
    public $showDeleteModal = false;
    public User $user;


    public function mount()
    {
        $this->user = $this->makeUserBlank();
    }

    public function makeUserBlank()
    {
        return User::make();
    }

    public function fetchAll()
    {
        return User::all();
    }

    public function changeDelete(User $user)
    {
        if($this->user->isNot($user)){
            $this->user = $user;
        }
        $this->showDeleteModal = true;
    }
    

    public function actionDelete()
    {
        $user = $this->user->delete();
        if($user){
            $this->fetchAll();
        }
        $this->showDeleteModal = false;
    }
    
    public function render()
    {
        return view('livewire.users.listuser', [
            'users' => $this->fetchAll()
        ]);
    }
}
