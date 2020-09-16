<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    
    protected $table = 'medicos';

    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "id",
        "clinica_id",
        "nome",
        "idade",
        "especializacao",
        "preco_consulta",
        "telefone",
        "email",
        "whatsapp",
        "foto",
    ];


}
