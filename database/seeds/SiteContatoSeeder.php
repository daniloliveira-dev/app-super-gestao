<?php

use Illuminate\Database\Seeder;
use \App\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {    
        /* 
        SiteContato::create([
            "nome" => 'pedro',
            "telefone" => '(13) 9 9999-9999',
            "email" => 'pedro@pedro.com.br',
            "motivo_contato" => '2',
            "mensagem" => 'Parabens, o super gestao e incrivel'
        ]);*/
        
        //EXECUTA O METODO FAKER PARA INSERIR DADOS FAKES DENTRO DA TABELA SITECONTATO, AFIM DE EXECUTAR TESTES UTILIZANDO O BANCO DE DADOS.
        factory(SiteContato::class, 100)->create(); 
    }
}
