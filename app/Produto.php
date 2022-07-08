<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];

    //-- RECUPERANDO DADOS DE OUTRA TABELA ATRAVES DE UM RELACIONAMENTO 1X1 USANDO O ELOQUENT ORM --//
    public function produtoDetalhe(){
        return $this->hasOne('App\ProdutoDetalhe');
    }
}
