<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    
    public function index () {
        $cursos = Curso::all();
        return $cursos;
    }
    public function show ($id) {
        $curso = Curso::find($id);
        return $curso;
    }
    public function store (Request $curso) {
            $newCurso = Curso::create($curso->all());
            if ($newCurso) {
                return response()->json([
                    'message' => 'Novo curso criado com sucesso.',
                    'curso' => $curso
                ]);
            }
            return response()->json([
                'message' => 'Algo inesperado aconteceu durante a inserção do curso.'
            ], 422);
    }
    public function update(Request $request, $id)
    {
        $curso = Curso::find($id);
        if (!$curso) {
            return response()->json(['message' => 'Curso não encontrado.'], 404);
        }

        $updated = $curso->update($request->all());
        if ($updated) {
            return response()->json([
                'message' => 'Curso atualizado com sucesso.',
                'curso' => $curso
            ]);
        }

        return response()->json([
            'message' => 'Erro ao tentar atualizar o curso.'
        ], 422);
    }

    public function destroy($id)
    {
        $curso = Curso::find($id);
      
        if (!$curso) {
            return response()->json(['message' => 'Curso não encontrado.'], 404);
        }

        if ($curso->delete()) {
            return response()->json(['message' => 'Curso deletado com sucesso.']);
        }

        return response()->json([
            'message' => 'Erro ao tentar deletar o curso.'
        ], 422);
    }
}
