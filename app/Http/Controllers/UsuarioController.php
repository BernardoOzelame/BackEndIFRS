<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Nutricionista;
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
    public function update(Request $request, $id)
    {
        $usuario = Usuario::find($id);
        if (!$usuario) {
            return response()->json(['message' => 'Usuário não encontrado.'], 404);
        }

        $updated = $usuario->update($request->all());
        if ($updated) {
            return response()->json([
                'message' => 'Usuário atualizado com sucesso.',
                'usuario' => $usuario
            ]);
        }

        return response()->json([
            'message' => 'Erro ao tentar atualizar o usuário.'
        ], 422);
    }

    public function destroy($id)
    {
        $usuario = Usuario::find($id);

        // foreign key - exclui o que o usuário for, nutricionista e aluno.
        Nutricionista::where('usuarioId', $id)->delete();
        Aluno::where('usuarioId', $id)->delete();

        if (!$usuario) {
            return response()->json(['message' => 'Usuário não encontrado.'], 404);
        }

        if ($usuario->delete()) {
            return response()->json(['message' => 'Usuário deletado com sucesso.']);
        }

        return response()->json([
            'message' => 'Erro ao tentar deletar o usuário.'
        ], 422);
    }
}
