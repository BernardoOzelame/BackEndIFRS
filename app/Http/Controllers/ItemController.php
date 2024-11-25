<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    
    public function index () {
        $items = Item::all();
        return $items;
    }
    public function show ($id) {
        $item = Item::find($id);
        return $item;
    }
    public function store () {
        
    }
    public function update () {
        
    }
    public function destroy () {
        
    }
}
