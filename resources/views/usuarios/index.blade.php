@extends('layouts.app')

@section('content')

<div>
    @if ($usuarios->isEmpty())
        <h3 class="text-center" style="margin-top: 200px; margin-bottom: 15px;">Não existem usuários cadastrados.</h3>
        <div class="text-center">
            <a href="{{ route('usuarios.create') }}" class="btn btn-success p-2">
                <i class="fa fa-plus icon-margin" aria-hidden="true"></i>Cadastrar Usuário
            </a>
        </div>
    @else
        <div class="novo">
            <a href="{{ route('usuarios.create') }}" class="btn btn-success p-2">
                <i class="fa fa-plus icon-margin" aria-hidden="true"></i>Novo Usuário
            </a>
        </div>

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
                                <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-info icon-margin text-white">
                                    <i class="fa fa-pencil icon-margin" aria-hidden="true"></i>
                                    Editar
                                </a>
                                <a href="{{ route('usuarios.destroy', $usuario->id) }}" class="btn btn-danger btn-delete">
                                    <i class="fa fa-trash icon-margin" aria-hidden="true"></i>Excluir
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div id="confirmModal" style="display: none;">
                <div>
                    <h3>Tem certeza que deseja excluir esse usuário?</h3>
                    <button id="cancelDelete" class="btn btn-secondary">Não</button>
                    <button id="confirmDelete" class="btn btn-danger">Sim</button>
                </div>
            </div>
        </div>
    @endif
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        var deleteButtons = document.getElementsByClassName('btn-delete');
        for (var i = 0; i < deleteButtons.length; i++) {
            deleteButtons[i].addEventListener('click', function(e) {
                e.preventDefault();
                var deleteUrl = this.getAttribute('href');
                document.getElementById('confirmModal').style.display = 'block';

                document.getElementById('confirmDelete').addEventListener('click', function() {
                    var xhr = new XMLHttpRequest();
                    xhr.open('DELETE', deleteUrl, true);
                    xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === XMLHttpRequest.DONE) {
                            if (xhr.status === 200) {
                                var response = JSON.parse(xhr.responseText);
                                if (response.success) {
                                    document.getElementById('confirmModal').style.display = 'none';
                                    location.reload();
                                }
                            }
                        }
                    };
                    xhr.send();
                });

                document.getElementById('cancelDelete').addEventListener('click', function() {
                    document.getElementById('confirmModal').style.display = 'none';
                });
            });
        }
    });
</script>
@endsection
