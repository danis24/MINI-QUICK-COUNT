<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flag extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'no_urut',
        'nama_partai',
        'logo',
        'singkatan'
    ];

    public function flagCount()
    {
        return $this->hasMany(FlagCount::class);
    }
}
