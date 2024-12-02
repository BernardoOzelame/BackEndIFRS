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
    public function store (Request $usuario) {
            $newUsuario = Usuario::create($usuario->all());
            if ($newUsuario) {
                return response()->json([
                    'message' => 'Novo Usuario criado com sucesso.',
                    'usuario' => $usuario
                ]);
            }
            return response()->json([
                'message' => 'Algo inesperado aconteceu durante a inserção do usuario.'
            ], 422);
    }
    public function update () {
        
    }
    public function destroy () {
        
    }
}
