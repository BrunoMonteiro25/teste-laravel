@extends('layouts.app')

@section('content')

<div class="novo">
    <a href="{{ route('usuarios.create') }}" class="btn btn-success p-2"><i class="fa fa-plus icon-margin" aria-hidden="true"></i>Novo Usuário</a>
</div>

<div>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr class="text-center">
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Data de Criação</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                <tr class="text-center">
                    <td>{{ $usuario->nome }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->created_at->format('d/m/Y') }}</td>
                    <td>
                        <a href="#" class="btn btn-primary icon-margin"><i class="fa fa-pencil icon-margin" aria-hidden="true"></i>Editar</a>

                        <a href="#" class="btn btn-danger"><i class="fa fa-trash icon-margin" aria-hidden="true"></i>Excluir</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection
