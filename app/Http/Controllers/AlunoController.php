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
    public function update () {
        
    }
    public function destroy () {
        
    }
}
