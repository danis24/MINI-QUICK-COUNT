<?php

namespace App\Livewire\Users;

use App\Models\User;
use App\Models\Village;
use Livewire\Component;

class Createuser extends Component
{

    public $form = [
        'name' => '',
        'email' => '',
        'password' => '',
        'village_id' => ''
    ];
    
    public function submit()
    {
        $this->validate([
            'form.name' => 'required',
            'form.email' => 'required',
            'form.password' => 'required',
            'form.village_id' => 'required',
        ]);

        $user = User::create($this->form);
        if($user){
            session()->flash('message', 'User Added Successfully !');
            return redirect(route('users.list'));
        }
        session()->flash('error', 'User Added Failed !');
        return redirect(route('users.create'));

    }


    public function render()
    {
        $user = User::where('village_id', '!=', 'null')->get();
        $villages = Village::whereNotIn('id', $user->pluck('village_id'))->get();
        return view('livewire.users.createuser', [
            'villages' => $villages
        ]);
    }
}
