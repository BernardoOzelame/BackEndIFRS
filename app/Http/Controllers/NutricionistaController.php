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
    public function update(Request $request, $id)
    {
        $nutricionista = Nutricionista::find($id);
        if (!$nutricionista) {
            return response()->json(['message' => 'Nutricionista não encontrada.'], 404);
        }

        $updated = $nutricionista->update($request->all());
        if ($updated) {
            return response()->json([
                'message' => 'Nutricionista atualizada com sucesso.',
                'nutricionista' => $nutricionista
            ]);
        }

        return response()->json([
            'message' => 'Erro ao tentar atualizar a nutricionista.'
        ], 422);
    }

    public function destroy($id)
    {
        $nutricionista = Nutricionista::find($id);
        if (!$nutricionista) {
            return response()->json(['message' => 'Nutricionista não encontrada.'], 404);
        }

        if ($nutricionista->delete()) {
            return response()->json(['message' => 'Nutricionista deletada com sucesso.']);
        }

        return response()->json([
            'message' => 'Erro ao tentar deletar a nutricionista.'
        ], 422);
    }
}
