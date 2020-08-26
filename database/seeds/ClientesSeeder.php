<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientes')->insert([
            'nome' => Str::random(10),
            'image' => Str::random(10) . '.png',
            'cpf_cnpj' => Str::random(9),
        ]);
    }
}
