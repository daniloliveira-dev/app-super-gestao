<!-- INCORPORANDO METODO PARA QUE SE CONSIGA USAR 1 FORMULARIO PARA EXECUTAR DUAS FUNCOES DIFERENTES, QUE É PRA EDICAO E INSERCAO DE DADOS -->
@if (isset($pedidos->id))
    <form method="POST" action="{{ route('pedido.update', ['pedido' => $pedido->id]) }}">
        @method('PUT')
        @csrf
    @else
        <form method="POST" action="{{ route('pedido.store') }}">
            @csrf
@endif

<select name="cliente_id">
    <option>- Selecione um cliente -</option>

    @foreach ($clientes as $cliente)
        <option value="{{ $cliente->id }}" {{ $pedido->cliente_id ?? old('cliente_id') == $cliente->id ? 'selected' : '' }}>
            {{ $cliente->nome }}</option>
    @endforeach
</select>
{{ $errors->has('cliente_id') ? $errors->first('cliente_id') : '' }}

<button type='submit' class='borda-preta'>Cadastrar Pedido</button>
</form>
