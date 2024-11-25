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
    public function store () {
        
    }
    public function update () {
        
    }
    public function destroy () {
        
    }
}
