<?php

namespace App\Livewire\Flags;

use App\Models\Flag;
use Livewire\Component;

class Listflags extends Component
{
    public function render()
    {
        return view('livewire.flags.listflags', [
            'flags' => Flag::all()
        ]);
    }
}
