@extends('app.layouts.basico')

@section('titulo', 'Pedido')

@section('conteudo')
    <div class='conteudo-pagina'>
        <div class='titulo-pagina-2'>
            <p>Listagem de Pedidos</p>
        </div>
        <div class='menu'>
            <ul>
                <li><a href='{{ route('pedido.create') }}'>Novo Pedido</a>
                <li><a href=''>Consulta</a>
            </ul>
        </div>
        <div class='informacao-pagina'>
            <div class="informacao-list">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th> # </th>
                            <th>Cliente</th>
                            <th>...</th>
                            <th>...</th>
                            <th>...</th>
                            <th>...</th>
                            <th>...</th>
                        <tr>
                    </thead>
                    <tbody>
                        @foreach ($pedidos as $pedido)
                            <tr>
                                <td>{{ $pedido->id }}</td>
                                <td>{{ $pedido->cliente_id }}</td>
                                <td><a href="{{ route('pedido-produto.create', ['pedido' => $pedido->id]) }}">Adicionar Produto</a></td>
                                <td><a href=""></a></td>
                                <td><a href=''>Visualizar</td>
                                <th><a href=''>Editar</th>
                                <td>
                                    <form id="form_{{ $pedido->id }}" method="post"
                                        action="{{ route('pedido.destroy', ['pedido' => $pedido->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                    </form>
                                    <a href='#'
                                        onclick="document.getElementById('form_{{ $pedido->id }}').submit()">Excluir</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- IMPLEMENTANDO A PAGINAÇÃO DE REGISTROS -->
                {{ $pedidos->appends($request)->links() }}
                <br>
                <!--
                            {{ $pedidos->count() . ' - Total de registros por pagina' }}
                            <br>
                            {{ $pedidos->total() . ' - Total de registros da consulta' }}
                            <br>
                            {{ $pedidos->firstItem() . ' - Número do primerio registro da página' }}
                            <br>s
                            {{ $pedidos->lastItem() . ' - Número do Ultimo registro da página' }}
                            <br>-->
                Exibindo {{ $pedidos->count() }} de {{ $pedidos->total() }} (de
                {{ $pedidos->firstItem() }} a {{ $pedidos->lastItem() }})
            </div>
        </div>
    </div>
@endsection()
