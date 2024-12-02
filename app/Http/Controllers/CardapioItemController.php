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
                 'message' => 'Novo cardapioItem criada com sucesso.',
                 'cardapioItem' => $cardapioItem
             ]);
         }
         return response()->json([
             'message' => 'Algo inesperado aconteceu durante a inserção do item do cardapio.'
         ], 422);
     }
     public function update () {
        
     }
     public function destroy () {
        
     }
 }
