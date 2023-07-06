@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div style="width: 450px;">
        <h2 class="text-center mb-4 fw-bold">Editar Usuário</h2>

        <form id="editar-usuario-form" method="POST" action="{{ route('usuarios.update', $usuario->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="nome">Nome</label>
                <input type="text" placeholder="Digite o nome" class="form-control" id="nome" name="nome" value="{{ $usuario->nome }}" required>
                <span id="nome-error" class="text-danger"></span>
            </div>

            <div class="form-group mb-3">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $usuario->email }}" placeholder="example@email.com" required>
                <span id="email-error" class="text-danger"></span>
            </div>

            <div class="form-group mb-3">
                <label for="data_nascimento">Data de Nascimento</label>
                <input type="text" class="form-control" placeholder="00/00/0000" id="data_nascimento" name="data_nascimento" value="{{ $usuario->data_nascimento }}">
                <span id="data-nascimento-error" class="text-danger"></span>
            </div>

            <div class="form-group mb-3">
                <label for="senha">Senha</label>
                <input type="password" placeholder="********" class="form-control" id="senha" name="senha" minlength="8" required>
                <span id="senha-error" class="text-danger"></span>
            </div>

            <button type="submit" id="salvar-btn" class="btn btn-success w-100"><i class="fa fa-check icon-margin" aria-hidden="true"></i>Salvar</button>

            <a href="{{ route('usuarios.index') }}" id="cancelar-btn" class="btn btn-danger w-100 mt-2"><i class="fa fa-ban icon-margin" aria-hidden="true"></i>Cancelar</a>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var salvarBtn = document.getElementById('salvar-btn');
        var form = document.getElementById('editar-usuario-form');

        salvarBtn.addEventListener('click', function (event) {
            event.preventDefault();

            var nomeInput = document.getElementById('nome');
            var emailInput = document.getElementById('email');
            var senhaInput = document.getElementById('senha');
            var dataNascimentoInput = document.getElementById('data_nascimento');

            var nomeError = document.getElementById('nome-error');
            var emailError = document.getElementById('email-error');
            var senhaError = document.getElementById('senha-error');
            var dataNascimentoError = document.getElementById('data-nascimento-error');

            nomeError.innerText = '';
            emailError.innerText = '';
            senhaError.innerText = '';
            dataNascimentoError.innerText = '';

            var nome = nomeInput.value.trim();
            var email = emailInput.value.trim();
            var senha = senhaInput.value.trim();
            var dataNascimento = dataNascimentoInput.value.trim();

            if (nome === '') {
                nomeError.innerText = 'Campo obrigatório*';
                return;
            }

            if (email === '') {
                emailError.innerText = 'Campo obrigatório*';
                return;
            }

            if (senha === '') {
                senhaError.innerText = 'Campo obrigatório*';
                return;
            } else if (senha.length < 8) {
                senhaError.innerText = 'A senha deve ter no mínimo 8 caracteres*';
                return;
            }

            function isValidDate(dateString) {
                var parts = dateString.split('/');
                var day = parseInt(parts[0], 10);
                var month = parseInt(parts[1], 10);
                var year = parseInt(parts[2], 10);

                if (isNaN(day) || isNaN(month) || isNaN(year)) {
                    return false;
                }

                var date = new Date(year, month - 1, day);
                if (
                    date.getFullYear() === year &&
                    date.getMonth() === month - 1 &&
                    date.getDate() === day
                ) {
                    return true;
                }

                return false;
            }

            if (dataNascimento === '' || !isValidDate(dataNascimento)) {
                dataNascimentoError.innerText = 'Digite a data no padrão - 00/00/0000*';
                return;
            }

            var formData = new FormData(form);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', form.action);
            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        alert('Usuário atualizado com sucesso!');
                        window.location.href = '{{ route("usuarios.index") }}';
                    } else if (xhr.status === 500) {
                        emailError.innerText = 'Este e-mail já está cadastrado.';
                        console.clear();
                    } else {
                        alert('Erro ao atualizar usuário.');
                    }
                }
            };

            xhr.onerror = function () {
                alert('Erro de conexão.');
            };
            xhr.send(formData);
        });
    });
</script>

@endsection
