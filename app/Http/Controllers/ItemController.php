<?php

namespace App\Http\Controllers;

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
    public function update () {
        
    }
    public function destroy () {
        
    }
}
