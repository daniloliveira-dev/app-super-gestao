<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

class MotivoContato extends Model
{   

    //-- VARIAVEL PROTEGIDA QUE PERMITE VOCE PASSAR QUE CAMPO DO DB PODE SER ENVIADO POR MEIO DE UM ARRAY ASSOCIATIVO --
    protected $fillable = ['motivo_contatos_id'];
}