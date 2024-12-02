<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('itens')->insert([
            'nome' => 'item1',
            'calorias' => 30.2,
            'grupo' => 'CARBOIDRATOS'
        ]);
    }
}
