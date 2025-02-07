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

        <input type="text" name="nome" placeholder="Nome" /><br />
        <input type="date" name="date_de_nascimento" placeholder="Data" /><br />
        <input type="text" name="turma" placeholder="Turma" /><br />

        <button type="submit">Salvar</button>

    </form>
@endsection
