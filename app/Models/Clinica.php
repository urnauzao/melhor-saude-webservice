<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinica extends Model
{
    use HasFactory;

    // protected $table = 'clinicas';

    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "id",
        "titulo",
        "url_imagem",
        "url",
        "descricao",
        "local_resumido",
        "endereco",
        "num_endereco",
        "complemento",
        "cep",
        "cidade",
        "bairro",
        "estado",
        "pais",
        "rating",
    ];

 



}
