<!-- INCORPORANDO METODO PARA QUE SE CONSIGA USAR 1 FORMULARIO PARA EXECUTAR DUAS FUNCOES DIFERENTES, QUE É PRA EDICAO E INSERCAO DE DADOS -->
@if (isset($clientes->id))
    <form method="POST" action="{{ route('cliente.update') }}">
        @method('PUT')
        @csrf
    @else
        <form method="POST" action="{{ route('cliente.store') }}">
            @csrf
@endif

<input type='text' name='nome' placeholder='Nome do Cliente' value="{{ $clientes->nome ?? old('nome') }}"
    class='borda-preta'>
{{ $errors->has('nome') ? $errors->first('nome') : '' }}
<button type='submit' class='borda-preta'>Cadastrar Cliente</button>
</form>
