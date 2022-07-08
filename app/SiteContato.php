<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//Site_Contato
//site_contato
//site_contatos

class SiteContato extends Model
{
    //-- VARIAVEL PROTEGIDA QUE PERMITE VOCE PASSAR QUE CAMPO DO DB PODE SER ENVIADO POR MEIO DE UM ARRAY ASSOCIATIVO --
    protected $fillable = ['nome','telefone','email','motivo_contatos_id','mensagem'];
}
