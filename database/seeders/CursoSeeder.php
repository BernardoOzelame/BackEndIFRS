<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cursos')->insert([
            'nome' => 'TÉCNICO EM INFORMÁTICA PARA INTERNET',
            'nomeReduzido' => 'INFO', 
            'nivelEnsino' => 'TECNICO'
        ]);
    }
}
