<?php

use App\Livewire\Dashboard;
use App\Livewire\Flags\Listflags;
use App\Livewire\Home;
use App\Livewire\Legislatives\Listlegislatives;
use App\Livewire\Login;
use App\Livewire\Users\Createuser;
use App\Livewire\Users\Listuser;
use App\Livewire\Users\Updateuser;
use App\Livewire\Villages\Listvillages;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', Home::class)->name('home');
Route::get('/login', Login::class)->name('login');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    //Flags
    Route::get('/flags', Listflags::class)->name('flags.list');

    // Legislatives
    Route::get('/legislatives', Listlegislatives::class)->name('legislatives.list');
    
    // Villages
    Route::get('/villages', Listvillages::class)->name('villages.list');
    
    // Users
    Route::get('/users', Listuser::class)->name('users.list');
    Route::get('/users/add', Createuser::class)->name('users.create');
    Route::get('/users/{id}/edit', Updateuser::class)->name('users.update');
});