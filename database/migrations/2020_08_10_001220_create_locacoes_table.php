<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locacoes', function (Blueprint $table) {
            $table->increments('id');
            $table->date('data_locacao');
            $table->date('data_devolucao')->nullable();
            $table->integer('cliente_id')->unsigned();
            $table->foreign('cliente_id', 'fk_locacoes_clientes')
                ->references('id')->on('clientes')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('filme_id')->unsigned();
            $table->foreign('filme_id', 'fk_locacoes_filmes')
                ->references('id')->on('filmes')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locacoes');
    }
}
