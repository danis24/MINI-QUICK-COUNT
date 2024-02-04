<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_desa',
        'jumlah_suara_masuk',
        'jumlah_suara_sah',
        'jumlah_suara_tidak_sah',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
