<?php

namespace App\Http\Controllers;

use App\Models\Cardapio;
use Illuminate\Http\Request;

class CardapioController extends Controller
{
    
    public function index () {
        $cardapios = Cardapio::all();
        return $cardapios;
    }
    public function show ($id) {
        $cardapio = Cardapio::find($id);
        return $cardapio;
    }
    public function store () {
        
    }
    public function update () {
        
    }
    public function destroy () {
        
    }
}
