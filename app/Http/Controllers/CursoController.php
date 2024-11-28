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
    public function update () {
        
    }
    public function destroy () {
        
    }
}
