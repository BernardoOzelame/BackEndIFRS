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
    public function update () {
        
    }
    public function destroy () {
        
    }
}
