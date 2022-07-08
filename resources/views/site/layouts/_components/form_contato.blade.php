{{ $slot }}
<form action={{ route('site.contato') }} method="post">
    <!-- TOKEN DE ENVIO PARA FORMULARIOS -->
    @csrf
    <input name="nome" type="text" value="{{ old('nome') }}" placeholder="Nome" class="{{ $classe }}">
        {{ $errors->has('nome') ? $errors->first('nome') : '' }}
    <br>
    <input name="telefone" type="text" value="{{ old('telefone') }}" placeholder="Telefone" class="{{ $classe }}">
        {{ $errors->has('telefone') ? $errors->first('telefone') : '' }}
    <br>
    <input name="email" type="text" value="{{ old('email') }}" placeholder="E-mail" class="{{ $classe }}">
        {{ $errors->has('email') ? $errors->first('email') : '' }}
    <br>

    <select name="motivo_contatos_id" class="{{ $classe }}">
        {{ $errors->has('motivo_contatos_id') ? $errors->first('motivo_contatos_id') : '' }}
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo_contatos_id as $key => $motivo_contatos)
            <option value="{{ $motivo_contatos->id }}"
                {{ old('motivo_contatos_id') == $motivo_contatos->id ? 'selected' : '' }}>
                {{ $motivo_contatos->motivo_contatos }}</option>
        @endforeach
    </select>
    <br>
    <textarea name="mensagem" class="{{ $classe }}" value="{{ old('mensagem') }}" placeholder="{{ old('mensagem') != '' ? old('mensagem') : 'Preencha aqui sua mensagem' }}"></textarea>
        {{ $errors->has('mensagem') ? $errors->first('mensagem') : '' }}
    <br>
    <button type="submit" class="{{ $classe }}">Enviar</button>
</form>
