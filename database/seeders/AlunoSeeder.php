<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlunoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('alunos')->insert([
            'usuarioId' => 1,
            'foto' => 'aluno.png',
            'nome' => 'aluno',
            'matricula' => '0220202020',
            'turmaId' => 1,
            'status' => 'MATRICULADO'
        ]);
    }
}
