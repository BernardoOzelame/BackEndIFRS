<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use Illuminate\Http\Request;

class TurnoController extends Controller
{
    
    public function index () {
        $turnos = Turno::all();
        return $turnos;
    }
    public function show ($id) {
        $turno = Turno::find($id);
        return $turno;
    }
    public function store (Request $turno) {
        $newTurno = Turno::create($turno->all());
        if ($newTurno) {
            return response()->json([
                'message' => 'Novo turno criada com sucesso.',
                'turno' => $turno
            ]);
        }
        return response()->json([
            'message' => 'Algo inesperado aconteceu durante a inserção do turno.'
        ], 422);
    }
    public function update(Request $request, $id)
    {
        $turno = Turno::find($id);
        if (!$turno) {
            return response()->json(['message' => 'Turno não encontrado.'], 404);
        }

        $updated = $turno->update($request->all());
        if ($updated) {
            return response()->json([
                'message' => 'Turno atualizado com sucesso.',
                'turno' => $turno
            ]);
        }

        return response()->json([
            'message' => 'Erro ao tentar atualizar o turno.'
        ], 422);
    }

    public function destroy($id)
    {
        $turno = Turno::find($id);
        if (!$turno) {
            return response()->json(['message' => 'Turno não encontrado.'], 404);
        }

        if ($turno->delete()) {
            return response()->json(['message' => 'Turno deletado com sucesso.']);
        }

        return response()->json([
            'message' => 'Erro ao tentar deletar o turno.'
        ], 422);
    }
}
