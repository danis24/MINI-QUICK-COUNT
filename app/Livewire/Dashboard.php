<?php

namespace App\Livewire;

use App\Models\Flag;
use App\Models\FlagCount;
use App\Models\Legislative;
use App\Models\LegislativeCount;
use App\Models\Village;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.dashboard', [
            'jumlah_suara_masuk' => Village::sum('jumlah_suara_masuk'),
            'jumlah_suara_sah' => Village::sum('jumlah_suara_sah'),
            'jumlah_suara_tidak_sah' => Village::sum('jumlah_suara_tidak_sah'),
            'flags' => $this->sortFlag(),
            'legislatives' => $this->sortLegislative(),
            'sum_all_count_flag' => FlagCount::sum('count'),
            'sum_all_count_legislative' => LegislativeCount::sum('count')
        ]);
    }

    public function sortFlag()
    {
        $flag = Flag::get();
        return $flag->sortByDesc(function ($flag) {
            return $flag->flagCount->sum('count');
        })->take(5);
    }

    public function sortLegislative()
    {
        $legislative = Legislative::get();
        return $legislative->sortByDesc(function ($legislative) {
            return $legislative->legislativeCount->sum('count');
        });
    }
    
}
