@extends('app.layouts.basico')

@section('titulo', ' Pedido Produto')

@section('conteudo')
    <div class='conteudo-pagina'>
        <div class='titulo-pagina-2'>
            <p>Adicionar Produtos ao pedido</p>
        </div>
        <div class='menu'>
            <ul>
                <li><a href='{{ route('pedido.index') }}'>Voltar</a>
                <li><a href=''>Consultar Pedido</a>
            </ul>
        </div>
        <div class='informacao-pagina'>
            <h4> Detalhes do Pedido</h4>
            <p>ID do Pedido: {{ $pedido->id }}</p>
            <p>Cliente: {{ $pedido->cliente_id }}</p>
            <div class="informacao-form">
                <h4> Itens do Pedido </h4>
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Nome do Produto</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedido->produtos as $produto)
                            <tr>
                                <td>{{ $produto->id }}</td>
                                <td>{{ $produto->nome }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @component('app.pedido_produto._components.form_create', ['pedido' => $pedido, 'produtos' => $produtos])
                @endcomponent
            </div>
        </div>
    </div>
@endsection()
