<?php

namespace App\Livewire\Legislatives;

use App\Models\Legislative;
use App\Models\LegislativeCount;
use Livewire\Component;

class Listlegislatives extends Component
{
    public function render()
    {
        return view('livewire.legislatives.listlegislatives', [
            'legislatives' => Legislative::all(),
            'sum_all_count' => LegislativeCount::sum('count')
        ]);
    }
}
