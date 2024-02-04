<?php

namespace App\Livewire\Legislatives;

use App\Models\Legislative;
use Livewire\Component;

class Listlegislatives extends Component
{
    public function render()
    {
        return view('livewire.legislatives.listlegislatives', [
            'legislatives' => Legislative::all()
        ]);
    }
}
