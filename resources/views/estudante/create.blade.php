@extends('layouts.app')
@section('content')
    <a href="/estudantes">Lista Estudantes</a>
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if (session('error'))
        <p>{{ session('error') }}</p>
    @endif

    <form action="/estudantes" method="post">
        @method('POST')
        @csrf

        <input type="text" name="nome" placeholder="Nome" />
        @if($errors->has('nome'))
            <p>{{$errors->first('nome')}}</p>
        @endif
        <br/>
        <input type="date" name="data_de_nascimento" placeholder="Data" />
        @if($errors->has('data_de_nascimento'))
            <p>{{$errors->first('data_de_nascimento')}}</p>
        @endif
        <br/>
        <input type="text" name="turma" placeholder="Turma" />
        @if($errors->has('turma'))
            <p>{{$errors->first('turma')}}</p>
        @endif
        <br/>

        <button type="submit">Salvar</button>

    </form>
@endsection