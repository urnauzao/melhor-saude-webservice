<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Clinica extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinicas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo'); //->unique();
            $table->string('url_imagem');
            $table->string('url');
            $table->string('descricao');
            $table->string('local_resumido');
            $table->string('endereco');
            $table->string('num_endereco');
            $table->string('complemento');
            $table->string('cep');
            $table->string('cidade');
            $table->string('bairro');
            $table->string('estado');
            $table->string('pais');
            $table->float('rating');
            $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();               
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clinicas');
    }
}
