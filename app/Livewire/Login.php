<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $title = "Login";

    public $form = [
        'email' => '',
        'password' => ''
    ];

    public function submit()
    {
        $this->validate([
            'form.email' => 'required|email',
            'form.password' => 'required'
        ]);

        if(Auth::attempt($this->form)) {
            return redirect(route('dashboard'));
        }else{
            session()->flash('error', 'Alamat Email atau password salah !');
            return redirect(route('login'));
        }
    }

    public function render()
    {
        return view('livewire.login');
    }
}
