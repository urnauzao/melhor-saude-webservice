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
            $table->id();
            $table->integer('clinica_id');
            $table->string('nome')->unique();
            $table->integer('idade');
            $table->string('especializacao');
            $table->string('preco_consulta');
            $table->string('telefone');
            $table->string('email');
            $table->integer('whatsapp');
            $table->string('foto');
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
