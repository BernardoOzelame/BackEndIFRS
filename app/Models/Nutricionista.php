<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nutricionista extends Model
{
    protected $fillable = [
        'nome',
        'crn'
    ];
}
