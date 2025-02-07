@extends('layouts.app')
@section('content')
<a href="/estudantes/create">Novo Estudante</a>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Data de Nascimento</th>
                <th>Turma</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($estudantes as $estudante)
                <tr>
                    <th>{{ $estudante->pessoa->nome }}</th>
                    <th>{{ $estudante->pessoa->data_de_nascimento }}</th>
                    <th>{{ $estudante->turma }}</th>
                    <td></td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
