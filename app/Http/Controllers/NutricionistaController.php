<?php

namespace App\Http\Controllers;

use App\Models\Nutricionista;
use Illuminate\Http\Request;

class NutricionistaController extends Controller
{

    public function index () {
        $nutricionistas = Nutricionista::all();
        return $nutricionistas;
    }
    public function show ($id) {
        $nutricionista = Nutricionista::find($id);
        return $nutricionista;
    }
    public function store () {
        
    }
    public function update () {
        
    }
    public function destroy () {
        
    }
}
