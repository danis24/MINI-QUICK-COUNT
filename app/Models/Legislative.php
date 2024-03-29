<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Legislative extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_urut', 'nama_calon',
    ];

    public function legislativeCount()
    {
        return $this->hasMany(LegislativeCount::class);
    }
}
