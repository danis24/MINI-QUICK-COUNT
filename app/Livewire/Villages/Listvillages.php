<?php

namespace App\Livewire\Villages;

use App\Models\Village;
use Livewire\Component;

class Listvillages extends Component
{
    public function render()
    {
        return view('livewire.villages.listvillages', [
            'villages' => Village::all()
        ]);
    }
}
