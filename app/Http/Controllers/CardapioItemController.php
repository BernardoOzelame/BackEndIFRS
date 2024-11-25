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
    public function store () {
        
    }
    public function update () {
        
    }
    public function destroy () {
        
    }
}
