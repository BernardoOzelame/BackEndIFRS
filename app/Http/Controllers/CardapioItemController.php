<?php

namespace App\Http\Controllers;

use App\Models\CardapioItem;
use Illuminate\Http\Request;

class CardapioItemController extends Controller {
    public function index() {
        $cardapioItems = CardapioItem::all();
        return $cardapioItems;
    }
    public function show($id) {
        $cardapioItem = CardapioItem::find($id);
        return $cardapioItem;
    }
    public function store(Request $request) {
        // Validação dos dados recebidos
        $data = $request->validate([
            'cardapioId' => 'required|integer',
            'itemIds' => 'required|array',
            'itemIds.*' => 'integer',
        ]);

        $itemIds = $data['itemIds'];
        $cardapioId = $data['cardapioId'];

        // Criação dos registros em batch
        $cardapioItems = [];
        foreach ($itemIds as $itemId) {
            $cardapioItems[] = [
                'cardapioId' => $cardapioId,
                'itemId' => $itemId,
            ];
        }

        // Inserção dos itens no banco de dados
        $inserted = CardapioItem::insert($cardapioItems);

        if ($inserted) {
            return response()->json([
                'message' => 'Nova relação de cardápio e itens criada com sucesso.',
                'cardapioId' => $cardapioId,
                'itemIds' => $itemIds,
            ]);
        }

        return response()->json([
            'message' => 'Algo inesperado aconteceu durante a inserção dos itens do cardápio.'
        ], 422);
    }
    public function update(Request $request, $id) {
        $cardapioItem = CardapioItem::find($id);
        if (!$cardapioItem) {
            return response()->json(['message' => 'Relação cardápio e item não encontrada.'], 404);
        }

        $updated = $cardapioItem->update($request->all());
        if ($updated) {
            return response()->json([
                'message' => 'Relação atualizada com sucesso.',
                'cardapioItem' => $cardapioItem
            ]);
        }

        return response()->json([
            'message' => 'Erro ao tentar atualizar relação.'
        ], 422);
    }

    public function destroy($id) {
        $cardapioItem = CardapioItem::find($id);
        if (!$cardapioItem) {
            return response()->json(['message' => 'Relação não encontrada.'], 404);
        }

        if ($cardapioItem->delete()) {
            return response()->json(['message' => 'Relação item e cardápio deletada com sucesso.']);
        }

        return response()->json([
            'message' => 'Erro ao tentar deletar relação entre cardápio e item.'
        ], 422);
    }
}
