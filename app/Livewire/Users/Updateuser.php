<?php

namespace App\Livewire\Users;

use App\Models\User;
use App\Models\Village;
use Livewire\Component;

class Updateuser extends Component
{

    public $form = [
        'name' => '',
        'email' => '',
        'village_id' => ''
    ];

    public $id;

    public function mount($id)
    {
        $user = $this->findUser($id)->first();;
        $this->form['name'] = $user->name;
        $this->form['email'] = $user->email;
        $this->form['village_id'] = $user->village_id;
        $this->id = $id;
    }

    public function findUser($id)
    {
        return User::where('id', $id);
    }

    public function render()
    {
        $villages = Village::all();
        return view('livewire.users.updateuser', [
            'villages' => $villages,
        ]);
    }

    public function update()
    {
        $this->validate([
            'form.name' => 'required',
            'form.email' => 'required|email',
            'form.village_id' => 'required'
        ]);

        $user = $this->findUser($this->id);
        $update = $user->update($this->form);
        if($update){
            session()->flash('User Berhasil Di Tambahkan');
            return redirect(route('users.list'));
        }
        session()->flash('User Gagal Di Tambahkan');
        return redirect(route('users.list'));
    }
}
