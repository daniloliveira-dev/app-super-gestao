@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class='conteudo-pagina'>
        <div class='titulo-pagina-2'>
            <p> Produto - Lista</p>
        </div>
        <div class='menu'>
            <ul>
                <li><a href='{{ route('produto.create') }}'>Novo Produto</a>
                <li><a href=''>Consulta</a>
            </ul>
        </div>
        <div class='informacao-pagina'>
            <div class="informacao-list">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th> # </th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Fornecedor</th>
                            <th>Peso</th>
                            <th>Unidade ID</th>
                            <th>Comprimento</th>
                            <th>Largura</th>
                            <th>Altura</th>
                            <th>Visualizar</th>
                            <th>Alteração</th>
                            <th>Exclusão</th>
                        <tr>
                    </thead>
                    <tbody>
                        @foreach ($produtos as $produto)
                            <tr>
                                <td>{{ $produto->id }}</td>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->descricao }}</td>
                                <td>{{ $produto->fornecedor->nome }}</td>
                                <td>{{ $produto->peso }}</td>
                                <td>{{ $produto->unidade_id }}</td>
                                <!-- POR MEIO DO ELOQUENT, VOCE BUSCA PRIMEIRO A VARIAVEL DO FOREACH->METHODO->CAMPODATABELA -->
                                <td>{{ $produto->produtoDetalhe->comprimento ?? '' }}</td>
                                <td>{{ $produto->produtoDetalhe->altura ?? '' }}</td>
                                <td>{{ $produto->produtoDetalhe->largura ?? '' }}</td>

                                <td><a href="{{ route('produto.show', ['produto' => $produto->id]) }}">Visualizar</td>
                                <th><a href='{{ route('produto.edit', ['produto' => $produto->id]) }}'>Editar</th>
                                <td>
                                    <form id="form_{{ $produto->id }}" method="post"
                                        action="{{ route('produto.destroy', ['produto' => $produto->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                    </form>
                                    <a href='#'
                                        onclick="document.getElementById('form_{{ $produto->id }}').submit()">Excluir</a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="12">
                                    Exibir o ID do Pedido:
                                    <p>Pedidos</p>
                                    @foreach ($produto->pedidos as $pedido)
                                        <a href="{{ route('pedido-produto.create', ['pedido' => $pedido->id]) }}">Visualizar1</a>
                                        Pedido: {{ $pedido->id }}
                                    @endforeach
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- IMPLEMENTANDO A PAGINAÇÃO DE REGISTROS -->
                {{ $produtos->appends($request)->links() }}
                <br>
                <!--
                                    {{ $produtos->count() . ' - Total de registros por pagina' }}
                                    <br>
                                    {{ $produtos->total() . ' - Total de registros da consulta' }}
                                    <br>
                                    {{ $produtos->firstItem() . ' - Número do primerio registro da página' }}
                                    <br>
                                    {{ $produtos->lastItem() . ' - Número do Ultimo registro da página' }}
                                    <br>-->
                Exibindo {{ $produtos->count() }} de {{ $produtos->total() }} (de
                {{ $produtos->firstItem() }} a {{ $produtos->lastItem() }})
            </div>
        </div>
    </div>
@endsection()
