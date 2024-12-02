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
        if (!$aluno) {
            return response()->json(['message' => 'Aluno não encontrado'], 404);
        }

        return response()->json($aluno);
    }
    public function store (Request $request) {
        $validated = $request->validate([
            'usuarioId' => 'required|integer',
            'foto' => 'nullable|string',
            'nome' => 'required|string|max:255',
            'matricula' => 'required|string|max:20|unique:alunos',
            'turmaId' => 'required|integer',
        ]);

        $aluno = Aluno::create($validated);

        return response()->json($aluno, 201);
    }
    public function update () {
        
    }
    public function destroy ($id) {
        $aluno = Aluno::find($id);

        if (!$aluno) {
            return response()->json(['message' => 'Aluno não encontrado'], 404);
        }

        $aluno->delete();

        return response()->json(['message' => 'Aluno deletado com sucesso']);
    }
}
