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
    public function store () {
        
    }
    public function update () {
        
    }
    public function destroy () {
        
    }
}
