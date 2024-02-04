<?php

namespace App\Livewire;

use Livewire\Component;

class InputForm extends Component
{
    public $tabListStyle = "inline-flex items-center px-4 py-3 rounded-lg hover:text-gray-900 bg-gray-50 hover:bg-gray-100 w-full dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white";
    public $tabSelectedStyle = "inline-flex items-center px-4 py-3 text-white bg-green-700 rounded-lg active w-full dark:bg-green-600";
    public $iconSelectedStyle = "w-4 h-4 me-2 text-white";
    public $iconListStyle = "w-4 h-4 me-2 text-gray-500 dark:text-gray-400";
    public $selected = 1;

    public function render()
    {
        return view('livewire.input-form');
    }

    public function changeTab($id)
    {
        $this->selected = $id;
    }
}
