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
    public function store () {
        
    }
    public function update () {
        
    }
    public function destroy () {
        
    }
}
