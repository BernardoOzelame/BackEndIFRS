<?php

namespace App\Http\Controllers;

use App\Models\Cardapio;
use App\Models\CardapioItem;
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
    public function update(Request $request, $id)
    {
        $cardapio = Cardapio::find($id);
        if (!$cardapio) {
            return response()->json(['message' => 'Cardapio não encontrado.'], 404);
        }

        $updated = $cardapio->update($request->all());
        if ($updated) {
            return response()->json([
                'message' => 'Cardapio atualizado com sucesso.',
                'cardapio' => $cardapio
            ]);
        }

        return response()->json([
            'message' => 'Erro ao tentar atualizar o cardapio.'
        ], 422);
    }

    public function destroy($id)
    {
        $cardapio = Cardapio::find($id);
      
        // foreign key - dissocia item do cardápio.
        CardapioItem::where('cardapioId', $id)->delete();

        if (!$cardapio) {
            return response()->json(['message' => 'Cardapio não encontrado.'], 404);
        }

        if ($cardapio->delete()) {
            return response()->json(['message' => 'Cardapio deletado com sucesso.']);
        }

        return response()->json([
            'message' => 'Erro ao tentar deletar o cardapio.'
        ], 422);
    }
}
