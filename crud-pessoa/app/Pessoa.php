<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    // na model vamos definir as fillable que serve para utilizar ao salvar o objeto pessoa ou recuperar-lo
    protected $fillable = [
        'nome', 'sobre_nome', 'nascimento', 'sexo',
    ];
}
