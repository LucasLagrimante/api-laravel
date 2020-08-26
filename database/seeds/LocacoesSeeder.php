<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LocacoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locacoes')->insert([
            'data_locacao' => '2020-01-01',
            'data_devolucao' => '2020-01-01',
            'cliente_id' => 1,
            'filme_id' => 1,
        ]);
    }
}
