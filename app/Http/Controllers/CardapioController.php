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
    public function store (Request $cardapio) {
        $newCardapio = Cardapio::create($cardapio->all());
        if ($newCardapio) {
            return response()->json([
                'message' => 'Novo cardapio criado com sucesso.',
                'cardapio' => $cardapio
            ]);
        }
        return response()->json([
            'message' => 'Algo inesperado aconteceu durante a inserção do cardapio.'
        ], 422);
    }
    public function update () {
        
    }
    public function destroy () {
        
    }
}
