<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinica extends Model
{
    use HasFactory;

    protected $table = 'clinicas';

    public $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "id",
        "nome",
        "url_imagem",
        "url",
        "whatsapp",
        "descricao",
        "local_resumido",
        "logradouro",
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
