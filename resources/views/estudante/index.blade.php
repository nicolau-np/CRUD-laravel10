@extends('layouts.app')
@section('content')
<a href="/estudantes/create">Novo Estudante</a>
    <table border="1" width="50%" 
        style="
            color:red; 
            background-color: yellow;
            text-align: center;
            
        ">
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
                    <td>{{ $estudante->pessoa->nome }}</td>
                    <td>{{ $estudante->pessoa->data_de_nascimento }}</td>
                    <td>{{ $estudante->turma }}</td>
                    <td>
                        <a href="/estudantes/{{ $estudante->id }}/edit">Editar</a>
                        {{-- Criando o botao de delete --}}
                        <form action="/estudantes/{{ $estudante->id }}" method="post">
                            @csrf {{-- Gerando os tookens --}}
                            @method('DELETE'){{-- O metodo delete que vai ser utilizado --}}
                            <button type="submit">eliminar</button>
                        </form>
                        {{-- Fim da Criacao do botao de delete --}}

                        {{-- -Show --}}
                        <a href="/estudantes/{{ $estudante->id }}">Detalhes</a>
                        {{-- Fim do comando Show --}}
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
