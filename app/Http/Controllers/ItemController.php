<?php

namespace App\Http\Controllers;

use App\Models\CardapioItem;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    
    public function index () {
        $itens = Item::all();
        return $itens;
    }
    public function show ($id) {
        $item = Item::find($id);
        return $item;
    }
    public function store (Request $item) {
        $newItem = Item::create($item->all());
        if ($newItem) {
            return response()->json([
                'message' => 'Novo item criado com sucesso.',
                'item' => $item
            ]);
        }
        return response()->json([
            'message' => 'Algo inesperado aconteceu durante a inserção do item.'
        ], 422);
    }
    public function update(Request $request, $id)
    {
        $item = Item::find($id);
        if (!$item) {
            return response()->json(['message' => 'Item não encontrado.'], 404);
        }

        $updated = $item->update($request->all());
        if ($updated) {
            return response()->json([
                'message' => 'Item atualizado com sucesso.',
                'item' => $item
            ]);
        }

        return response()->json([
            'message' => 'Erro ao tentar atualizar o item.'
        ], 422);
    }

    public function destroy($id)
    {
        $item = Item::find($id);
      
        // foreign key - dissocia item do cardápio.
        CardapioItem::where('itemId', $id)->delete();

        if (!$item) {
            return response()->json(['message' => 'Item não encontrado.'], 404);
        }

        if ($item->delete()) {
            return response()->json(['message' => 'Item deletado com sucesso.']);
        }

        return response()->json([
            'message' => 'Erro ao tentar deletar o item.'
        ], 422);
    }
}
