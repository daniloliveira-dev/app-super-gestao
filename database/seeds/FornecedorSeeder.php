<?php

use Illuminate\Database\Seeder;
use \App\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        //PARA ACOSTUMAR COM O USO DE ARRAYS ASSOCIATIVOS, USE ESSE METODO DE INSERCAO.
        //ATENCAO AO METODO $FILLABLE NO MODEL DA CLASSE FORNECEDOR.
        Fornecedor::create([
            "nome" => "Fornecedor 2",
            "site" => "fornecedor2.com.br",
            "uf" => "RJ",
            "email" => "fornecedor2@contato.com.br",
        ]);*/

        factory(Fornecedor::class , 100)->create();
    }
}
