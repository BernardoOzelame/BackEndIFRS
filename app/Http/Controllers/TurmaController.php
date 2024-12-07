<?php

namespace App\Http\Controllers;

use App\Models\Turma;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    
    public function index () {
        $turmas = Turma::all();
        return $turmas;
    }
    public function show ($id) {
        $turma = Turma::find($id);
        return $turma;
    }
    public function store (Request $turma) {
        $newTurma = Turma::create($turma->all());
        if ($newTurma) {
            return response()->json([
                'message' => 'Nova turma criada com sucesso.',
                'turma' => $turma
            ]);
        }
        return response()->json([
            'message' => 'Algo inesperado aconteceu durante a inserção da turma.'
        ], 422);
    }
    public function update(Request $request, $id)
    {
        $turma = Turma::find($id);
        if (!$turma) {
            return response()->json(['message' => 'Turma não encontrada.'], 404);
        }

        $updated = $turma->update($request->all());
        if ($updated) {
            return response()->json([
                'message' => 'Turma atualizada com sucesso.',
                'turma' => $turma
            ]);
        }

        return response()->json([
            'message' => 'Erro ao tentar atualizar a turma.'
        ], 422);
    }

    public function destroy($id)
    {
        $turma = Turma::find($id);
        if (!$turma) {
            return response()->json(['message' => 'Turma não encontrada.'], 404);
        }

        if ($turma->delete()) {
            return response()->json(['message' => 'Turma deletada com sucesso.']);
        }

        return response()->json([
            'message' => 'Erro ao tentar deletar a turma.'
        ], 422);
    }
}
