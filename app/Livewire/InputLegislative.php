<?php

namespace App\Livewire;

use App\Models\Legislative;
use App\Models\LegislativeCount;
use Livewire\Component;

class InputLegislative extends Component
{
    public Legislative $legislative;
    public $legislatives;
    public $legislative_data = [];

    public function mount()
    {
        $this->legislative = $this->makeLegislativeBlank();
        $this->legislatives = $this->fetchAll();
        $legislativeCount = LegislativeCount::where("village_id", auth()->user()->village['id'])->get();
        foreach($legislativeCount as $key => $value){
            $this->legislative_data[$value->legislative_id] = $value->count;
        }
    }

    public function makeLegislativeBlank()
    {
        return Legislative::make();
    }

    public function fetchAll()
    {
        return $this->legislative->all();
    }

    public function render()
    {
        return view('livewire.input-legislative', [
            'legislatives' => $this->legislatives
        ]);
    }

    public function saveCount()
    {
        $data = $this->legislative_data;
        foreach($data as $key => $value){
            $flagCount = LegislativeCount::updateOrCreate([
                'village_id' => auth()->user()->village['id'],
                'legislative_id' => $key,
            ],[
                'count' => $value
            ]);
        }
        if($flagCount){
            session()->flash('message', 'Data Berhasil Di Simpan !');
            return redirect(route('dashboard'));
        }
    }
}
