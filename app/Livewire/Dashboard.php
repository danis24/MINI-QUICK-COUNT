<?php

namespace App\Livewire;

use App\Models\Flag;
use App\Models\FlagCount;
use App\Models\Legislative;
use App\Models\LegislativeCount;
use App\Models\Village;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
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
            'sum_all_count_legislative' => LegislativeCount::sum('count'),
            'columnChartModelFlag' => $this->chartFlag(),
            'columnChartModelLegislative' => $this->chartLegislative(),
        ]);
    }

    public function sortFlag()
    {
        $flag = Flag::get();
        return $flag->sortByDesc(function ($flag) {
            return $flag->flagCount->sum('count');
        })->take(7);
    }
    
    public function chartLegislative()
    {
        $colors = ['#f6ad55', '#fc8181', '#90cdf4', '#FF0000', '#8fce00', '#FFFF00', '#000000'];
        $legislative = Legislative::get();
        $legislatives = $legislative->sortByDesc(function ($legislative) {
            return $legislative->legislativeCount->sum('count');
        })->take(5);

        $column = (new ColumnChartModel())
            ->setTitle('Statistic Data Legislative');
        $count = 0;
        foreach($legislatives as $key => $value)
        {
            $column->addColumn($value->nama_calon, $value->legislativeCount->sum('count'), $colors[$count++]);
        }
        return $column;
    }

    public function chartFlag()
    {
        $colors = ['#f6ad55', '#fc8181', '#90cdf4', '#FF0000', '#8fce00', '#FFFF00', '#000000'];

        $flag = Flag::get();
        $flags = $flag->sortByDesc(function ($flag) {
            return $flag->flagCount->sum('count');
        })->take(7);

        $column = (new ColumnChartModel())
            ->setTitle('Statistic Data Partai');
        $count = 0;
        foreach($flags as $key => $value)
        {
            $column->addColumn($value->singkatan, $value->flagCount->sum('count'), $colors[$count++]);
        }
        return $column;
    }

    public function sortLegislative()
    {
        $legislative = Legislative::get();
        return $legislative->sortByDesc(function ($legislative) {
            return $legislative->legislativeCount->sum('count');
        });
    }
    
}
