<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'produtos';
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id', 'fornecedor_id'];

    //-- RECUPERANDO DADOS DE OUTRA TABELA ATRAVES DE UM RELACIONAMENTO 1X1 USANDO O ELOQUENT ORM --//
    public function produtoDetalhe()
    {
        return $this->hasOne('App\ItemDetalhe', 'produto_id', 'id');
    }

    public function fornecedor()
    {
        return $this->belongsTo('App\Fornecedor');
    }

    public function pedidos()
    {
        return $this->belongsToMany('App\Pedido', 'pedidos_produtos', 'produto_id', 'pedido_id');

        //*-- esses parametros so serao necessarios quando estamos utilizando classes nao padronizadas no model, no caso de ITEM = Produto --//
        //-- 3 parametro: representa o nome da FK da tabela mapeada pelo model na tabela de relacionamento --//
        //-- 4 parametro: representa o nome da FK da tabela mapeada plo model utilkizado no relacionamento que esta sendo implementado --*//
    }
}
