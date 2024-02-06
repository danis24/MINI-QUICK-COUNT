<?php

namespace App\Livewire;

use Livewire\Component;

class Navbar extends Component
{
    public $navActive = "text-white mx-3 my-10 bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700";
    public $navLink = "block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700";
    public function render()
    {
        return view('livewire.navbar');
    }
}
