<?php

use Illuminate\Database\Seeder;
use \App\MotivoContato;

class MotivoContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //-- POPULA O BANCO DE DADOS COM 3 TIPOS DE MOTIVO CONTATOS QUE SERA EXIBIDO NO SELECT NA VIEW DO USUARIO -- //
        //-- OBS: CASO SEJA ADICIONADO MAIS UM TIPO DE MOTIVO CONTATO, O USUARIO VAI CONSEGUIR VISUALIZA-LO NO SELECT -- //
        MotivoContato::create(['motivo_contatos' => 'Dúvida']);
        MotivoContato::create(['motivo_contatos' => 'Elogio']);
        MotivoContato::create(['motivo_contatos' => 'Reclamação']);
        MotivoContato::create(['motivo_contatos' => 'Dúvida']);
    }
}
