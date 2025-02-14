@extends('layouts.app')
@section('content')
    <a href="/estudantes">Lista Estudantes</a>
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if (session('error'))
        <p>{{ session('error') }}</p>
    @endif

    <form action="/estudantes/{{ $estudante->id }}" method="post">
        @method('PUT')
        @csrf

        <input type="text" name="nome" placeholder="Nome" value="{{ $estudante->pessoa->nome }}"/>
        @if($errors->has('nome'))
            <p>{{$errors->first('nome')}}</p>
        @endif
        <br/>
        <input type="date" name="data_de_nascimento" placeholder="Data" value="{{ $estudante->pessoa->data_de_nascimento }}" />
        @if($errors->has('data_de_nascimento'))
            <p>{{$errors->first('data_de_nascimento')}}</p>
        @endif
        <br/>
        <input type="text" name="turma" placeholder="Turma" value="{{ $estudante->turma }}" />
        @if($errors->has('turma'))
            <p>{{$errors->first('turma')}}</p>
        @endif
        <br/>

        <button type="submit">Salvar</button>

    </form>
@endsection