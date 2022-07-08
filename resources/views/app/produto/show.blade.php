@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class='conteudo-pagina'>
        <div class='titulo-pagina-2'>
            <p>Detalhes do Produto</p>
        </div>
        <div class='menu'>
            <ul>
                <li><a href='{{ route('produto.index') }}'>Voltar</a>
                <li><a href=''>Consultar Produto</a>
            </ul>
        </div>
        <div class='informacao-pagina'>
            <div class="informacao-form">
                <table border="1" style="text-align: center">
                    <tr>
                        <td>Detalhes do Produto</td>
                        <td>Identificador:{{$produto->id}}</td>                  
                    </tr>
                    <tr>
                        <td>Nome</td>
                        <td>{{$produto->nome}}</td>                  
                    </tr>

                    <tr>
                        <td>Descrição</td>
                        <td>{{$produto->descricao}}</td>                  
                    </tr>

                    <tr>
                        <td>Peso</td>
                        <td>{{$produto->peso}} Kg</td>                  
                    </tr>

                    <tr>
                        <td>Unidade de Medida</td>
                        <td>{{$produto->unidade_id}}</td>                  
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection()
