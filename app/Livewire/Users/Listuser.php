<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class Listuser extends Component
{
    public $userId = 0;

    public function fetchAll()
    {
        return User::all();
    }

    public function changeDelete($userId)
    {
        $this->userId = $userId;
    }

    public function actionDelete()
    {
        if($this->userId == 0){
            return;
        }
        $user = User::findOrFail($this->userId);
        $user->delete();
        if($user){
            $this->fetchAll();
        }
        $this->userId = 0;
    }
    

    public function render()
    {
        return view('livewire.users.listuser', [
            'users' => $this->fetchAll()
        ]);
    }
}
