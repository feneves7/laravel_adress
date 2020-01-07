<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adress extends Model
{
    protected $fillable = ['cep', 'logradouro', 'numero', 'complemento', 'bairro', 'localidade', 'uf'];
}
