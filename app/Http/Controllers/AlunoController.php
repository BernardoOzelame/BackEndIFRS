<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    
    public function index () {
        $alunos = Aluno::all();
        return $alunos;
    }
    public function show ($id) {
        $aluno = Aluno::find($id);
        return $aluno;
    }
    public function store (Request $aluno) {
        $newAluno = Aluno::create($aluno->all());
        if ($newAluno) {
            return response()->json([
                'message' => 'Novo aluno criado com sucesso.',
                'aluno' => $aluno
            ]);
        }
        return response()->json([
            'message' => 'Algo inesperado aconteceu durante a inserção de aluno.'
        ], 422);
    }
    public function update(Request $request, $id)
    {
        $aluno = Aluno::find($id);
        if (!$aluno) {
            return response()->json(['message' => 'Aluno não encontrado.'], 404);
        }

        $updated = $aluno->update($request->all());
        if ($updated) {
            return response()->json([
                'message' => 'Aluno atualizado com sucesso.',
                'aluno' => $aluno
            ]);
        }

        return response()->json([
            'message' => 'Erro ao tentar atualizar o aluno.'
        ], 422);
    }

    public function destroy($id)
    {
        $aluno = Aluno::find($id);
        if (!$aluno) {
            return response()->json(['message' => 'Aluno não encontrado.'], 404);
        }

        if ($aluno->delete()) {
            return response()->json(['message' => 'Aluno deletado com sucesso.']);
        }

        return response()->json([
            'message' => 'Erro ao tentar deletar o aluno.'
        ], 422);
    }
}
