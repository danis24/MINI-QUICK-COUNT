<?php

namespace App\Livewire\Flags;

use App\Models\Flag;
use App\Models\FlagCount;
use Livewire\Component;

class Listflags extends Component
{
    
    public function render()
    {
        return view('livewire.flags.listflags', [
            'flags' => Flag::all(),
            'sum_all_count' => FlagCount::sum('count')
        ]);
    }

    
}
