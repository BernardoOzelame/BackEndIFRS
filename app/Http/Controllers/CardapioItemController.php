<?php

namespace App\Http\Controllers;

use App\Models\CardapioItem;
use Illuminate\Http\Request;

class CardapioItemController extends Controller
{
     public function index () {
         $cardapioItems = CardapioItem::all();
         return $cardapioItems;
     }
     public function show ($id) {
         $cardapioItem = CardapioItem::find($id);
         return $cardapioItem;
     }
     public function store (Request $cardapioItem) {
         $newCardapioItem = CardapioItem::create($cardapioItem->all());
         if ($newCardapioItem) {
             return response()->json([
                 'message' => 'Nova relação de cardápio e item criada com sucesso.',
                 'cardapioItem' => $cardapioItem
             ]);
         }
         return response()->json([
             'message' => 'Algo inesperado aconteceu durante a inserção do item do cardapio.'
         ], 422);
     }
     public function update(Request $request, $id)
     {
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
 
     public function destroy($id)
     {
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
