@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')
    <div class='conteudo-pagina'>
        <div class='titulo-pagina-2'>
            <p>Listagem de Clientes</p>
        </div>
        <div class='menu'>
            <ul>
                <li><a href='{{route('cliente.create')}}'>Novo Cliente</a>
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
                            <th>...</th>
                            <th>...</th>
                            <th>...</th>
                        <tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <td>{{ $cliente->id }}</td>
                                <td>{{ $cliente->nome }}</td>
                               
                                <td><a href="">Visualizar</td>
                                <th><a href=''>Editar</th>
                                <td>
                                    <form id="form_{{$cliente->id}}" method="post" action="{{ route('cliente.destroy', ['cliente' => $cliente->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                    </form>
                                    <a href='#' onclick="document.getElementById('form_{{$cliente->id}}').submit()">Excluir</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- IMPLEMENTANDO A PAGINAÇÃO DE REGISTROS -->
                {{ $clientes->appends($request)->links() }}
                <br>
                <!--
                        {{ $clientes->count() . ' - Total de registros por pagina' }}
                        <br>
                        {{ $clientes->total() . ' - Total de registros da consulta' }}
                        <br>
                        {{ $clientes->firstItem() . ' - Número do primerio registro da página' }}
                        <br>s
                        {{ $clientes->lastItem() . ' - Número do Ultimo registro da página' }}
                        <br>-->
                Exibindo {{ $clientes->count() }} de {{ $clientes->total() }} (de
                {{ $clientes->firstItem() }} a {{ $clientes->lastItem() }})
            </div>
        </div>
    </div>
@endsection()
