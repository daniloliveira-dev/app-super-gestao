@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class='conteudo-pagina'>
        <div class='titulo-pagina-2'>
            <p> Fornecedor - Adicionar </p>
        </div>
        <div class='menu'>
            <ul>
                <li><a href='{{ route('app.fornecedor.adicionar') }}'>Novo</a>
                <li><a href='{{ route('app.fornecedor') }}'>Consultar</a>
            </ul>
        </div>
        <div class='informacao-pagina'>
            <div class="informacao-form">
                <form method="POST" action="{{ route('app.fornecedor.adicionar') }}">
                    <input type="hidden" name="id" value="{{ $fornecedor->id ?? ''}}">
                    {{ $msg ?? ''}}
                    @csrf
                    <input type='text' name='nome' placeholder='Nome' value="{{ $fornecedor->nome ?? old('nome') }}" class='borda-preta'>
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}

                    <input type='site' name='site' placeholder='Site' value="{{ $fornecedor->site ?? old('site') }}" class='borda-preta'>
                    {{ $errors->has('site') ? $errors->first('site') : '' }}

                    <input type='uf' name='uf' placeholder='Unidade Federação' value="{{ $fornecedor->uf ?? old('uf') }}" class='borda-preta'>
                    {{ $errors->has('uf') ? $errors->first('uf') : '' }}

                    <input type='email' name='email' placeholder='E-mail' value="{{ $fornecedor->email ?? old('email') }}"
                        class='borda-preta'>
                    {{ $errors->has('email') ? $errors->first('email') : '' }}

                    <button type='submit' class='borda-preta'>Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection()
