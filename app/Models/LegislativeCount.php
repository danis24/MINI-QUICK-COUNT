<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegislativeCount extends Model
{
    use HasFactory;

    protected $fillable = [
        'village_id', 'legislative_id', 'count'
    ];
}
