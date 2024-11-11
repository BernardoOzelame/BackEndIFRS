<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    
    public function index () {
        $usuarios = Usuario::all();
        return $usuarios;
    }
    public function show ($id) {
        $usuario = Usuario::find($id);
        return $usuario;
    }
    public function store () {
        
    }
    public function update () {
        
    }
    public function destroy () {
        
    }
}
