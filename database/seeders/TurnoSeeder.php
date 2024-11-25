<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TurnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('turnos')->insert([
            'horaInicio' => '2024-11-24', 
            'horaFim' => '2024-11-25', 
            'disponibilidade' => 'DOMINGO',
            'tipoRefeicao' => 'CAFE_DA_MANHA'
        ]);
    }
}
