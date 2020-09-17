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
            $table->increments('id');
            $table->string('nome'); //->unique();
            $table->string('url_imagem')->nullable();
            $table->string('url')->nullable();
            $table->string('descricao')->nullable();
            $table->string('local_resumido')->nullable();
            $table->string('endereco')->nullable();
            $table->string('num_endereco')->nullable();
            $table->string('complemento')->nullable();
            $table->string('cep')->nullable();
            $table->string('cidade')->nullable();
            $table->string('bairro')->nullable();
            $table->string('estado')->nullable();
            $table->string('pais')->nullable();
            $table->float('rating')->nullable();
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
