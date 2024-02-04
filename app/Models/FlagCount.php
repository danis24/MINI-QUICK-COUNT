<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlagCount extends Model
{
    use HasFactory;

    protected $fillable = [
        'village_id', 'flag_id', 'count'
    ];
}
