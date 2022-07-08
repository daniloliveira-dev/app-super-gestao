@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class='conteudo-pagina'>
        <div class='titulo-pagina-2'>
            <p> Fornecedor - Listar</p>
        </div>
        <div class='menu'>
            <ul>
                <li><a href='{{ route('app.fornecedor.adicionar') }}'>Novo</a>
                <li><a href='{{ route('app.fornecedor') }}'>Consulta</a>
            </ul>
        </div>
        <div class='informacao-pagina'>
            <div class="informacao-list">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th> # </th>
                            <th>Nome</th>
                            <th>Site</th>
                            <th>UF</th>
                            <th>E-mail</th>
                            <th>...</th>
                            <th>...</th>
                        <tr>
                    </thead>
                    <tbody>
                        @foreach ($fornecedores as $fornecedor)
                            <tr>
                                <td>{{ $fornecedor->id }}</td>
                                <td>{{ $fornecedor->nome }}</td>
                                <td>{{ $fornecedor->site }}</td>
                                <td>{{ $fornecedor->uf }}</td>
                                <td>{{ $fornecedor->email }}</td>
                                <th><a href='{{ route('app.fornecedor.editar', $fornecedor->id) }}'>Editar</th>
                                <td><a href='{{ route('app.fornecedor.excluir', $fornecedor->id) }}'>Excluir</td>
                            </tr>
                            <tr>
                                <td colspan='6'>
                                    <p> Lista de Produtos</p>
                                    <table border="1" style="margin:20px">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nome</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($fornecedor->produtos as $key => $produto)
                                                <tr>
                                                    <td>{{$produto->id}}</td>
                                                    <td>{{$produto->descricao}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- IMPLEMENTANDO A PAGINAÇÃO DE REGISTROS -->
                {{ $fornecedores->appends($request)->links() }}
                <br>
                <!--
                                    {{ $fornecedores->count() . ' - Total de registros por pagina' }}
                                    <br>
                                    {{ $fornecedores->total() . ' - Total de registros da consulta' }}
                                    <br>
                                    {{ $fornecedores->firstItem() . ' - Número do primerio registro da página' }}
                                    <br>
                                    {{ $fornecedores->lastItem() . ' - Número do Ultimo registro da página' }}
                                    <br>-->
                Exibindo {{ $fornecedores->count() }} de {{ $fornecedores->total() }} (de
                {{ $fornecedores->firstItem() }} a {{ $fornecedores->lastItem() }})
            </div>
        </div>
    </div>
@endsection()
