<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cardapio extends Model
{
    protected $fillable = [
        'data',
        'tipoRefeicao',
        'nutricionistaId'
    ];
}
