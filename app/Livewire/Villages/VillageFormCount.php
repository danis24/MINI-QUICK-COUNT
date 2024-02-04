<?php

namespace App\Livewire\Villages;

use App\Models\Village;
use Livewire\Component;

class VillageFormCount extends Component
{
    public Village $village;
    public $village_data = [
        'jumlah_suara_masuk' => 0,
        'jumlah_suara_sah' => 0,
        'jumlah_suara_tidak_sah' => 0
    ];

    public function mount()
    {
        $this->village = $this->makeVillageBlank();
        $village_data = Village::where("id", auth()->user()->village_id)->first();
        $this->village_data = [
            'jumlah_suara_masuk' => $village_data->jumlah_suara_masuk,
            'jumlah_suara_sah' => $village_data->jumlah_suara_sah,
            'jumlah_suara_tidak_sah' => $village_data->jumlah_suara_tidak_sah,
        ];
    }

    public function submit()
    {
        $village = $this->village->findOrFail(auth()->user()->village_id);
        $village->update($this->village_data);
        session()->flash('message', 'Data Berhasil Di Simpan !');
        return redirect(route('dashboard'));
    }

    public function makeVillageBlank()
    {
        return Village::make();
    }

    public function render()
    {
        return view('livewire.villages.village-form-count', [
            'selectedVillage' => $this->village_data
        ]);
    }
}
