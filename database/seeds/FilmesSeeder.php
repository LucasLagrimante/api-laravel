<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FilmesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('filmes')->insert([
            'titulo' => Str::random(10),
            'capa' => Str::random(10) . '.png',
            'disponivel' => 'S',
        ]);
    }
}
