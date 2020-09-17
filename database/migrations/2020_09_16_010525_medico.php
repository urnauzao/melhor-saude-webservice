<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Medico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('clinica_id');
            $table->string('nome')->unique();
            $table->integer('idade')->nullable();
            $table->string('especializacao')->nullable();
            $table->string('preco_consulta')->nullable();
            $table->string('telefone')->nullable();
            $table->string('email')->nullable();
            $table->integer('whatsapp')->nullable();
            $table->string('foto')->nullable();
            $table->foreign('clinica_id')->references('id')->on('clinicas');             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicos');
    }
}
