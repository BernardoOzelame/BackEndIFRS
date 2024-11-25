<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $fillable = [
        'usuarioId',
        'foto',
        'nome',
        'matricula',
        'turmaId'  
    ];
}
