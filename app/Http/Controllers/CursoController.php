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
    public function store () {
        
    }
    public function update () {
        
    }
    public function destroy () {
        
    }
}
