<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    protected $fillable = [
        'horaInicio', 
        'horaFim', 
        'disponibilidade',
        'tipoRefeicao'
    ];
}