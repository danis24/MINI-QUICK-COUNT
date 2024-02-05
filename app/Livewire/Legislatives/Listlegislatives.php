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
            'legislatives' => $this->sortLegislative(),
            'sum_all_count' => LegislativeCount::sum('count')
        ]);
    }

    public function sortLegislative()
    {
        $legislative = Legislative::get();
        return $legislative->sortByDesc(function ($legislative) {
            return $legislative->legislativeCount->sum('count');
        });
    }
}
