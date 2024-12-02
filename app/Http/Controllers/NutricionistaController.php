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
    public function store (Request $nutricionista) {
        $newNutricionista = Nutricionista::create($nutricionista->all());
        if ($newNutricionista) {
            return response()->json([
                'message' => 'Nova nutricionista criada com sucesso.',
                'nutricionista' => $nutricionista
            ]);
        }
        return response()->json([
            'message' => 'Algo inesperado aconteceu durante a inserção da nutricionista.'
        ], 422);
    }
    public function update () {
        
    }
    public function destroy () {
        
    }
}
