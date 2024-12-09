<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CardapioItem extends Model {
    protected $table = 'cardapios_itens';

    protected $fillable = [
        'cardapioId',
        'itemIds'
    ];
}
