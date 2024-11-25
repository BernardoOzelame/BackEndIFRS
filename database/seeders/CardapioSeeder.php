<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CardapioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cardapios')->insert([
            'data' => '2024-11-24',
            'tipoRefeicao' => 'CAFE_DA_MANHA',
            'nutricionistaId' => 1
        ]);
    }
}
