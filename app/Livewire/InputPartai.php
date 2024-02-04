<?php

namespace App\Livewire;

use App\Models\Flag;
use App\Models\FlagCount;
use Livewire\Component;

class InputPartai extends Component
{
    public Flag $flag;
    public $flags;
    public $flag_data = [];

    public function mount()
    {
        $this->flag = $this->makeFlagBlank();
        $flags = $this->fetchAll();
        $this->flags = $flags;
        $flagCounts = FlagCount::where("village_id", auth()->user()->village['id'])->get();
        foreach($flagCounts as $key => $value){
            $this->flag_data[$value->flag_id] = $value->count;
        }
    }

    public function makeFlagBlank()
    {
        return Flag::make();
    }

    public function render()
    {
        return view('livewire.input-partai', [
            'flags' => $this->flags
        ]);
    }

    public function fetchAll()
    {
        return $this->flag->all();
    }

    public function saveCount()
    {
        $data = $this->flag_data;
        foreach($data as $key => $value){
            $flagCount = FlagCount::updateOrCreate([
                'village_id' => auth()->user()->village['id'],
                'flag_id' => $key,
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
