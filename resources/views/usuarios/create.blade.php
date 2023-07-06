@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div style="width: 450px;">
        <h2 class="text-center mb-4 fw-bold">Novo Usuário</h2>

        <form id="form-usuario" action="{{ route('usuarios.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group mb-3">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome">
            </div>

            <div class="form-group mb-3">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Digite o e-mail">
            </div>

            <div class="form-group mb-3">
                <label for="data_nascimento">Data de Nascimento</label>
                <input type="text" class="form-control" id="data_nascimento" name="data_nascimento" placeholder="00/00/0000">
            </div>

            <div class="form-group mb-3">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite a senha">
            </div>

            <button type="submit" id="btn-salvar" class="btn btn-success w-100"><i class="fa fa-plus icon-margin" aria-hidden="true"></i>Salvar</button>

            <a href="{{ route('usuarios.index') }}" class="btn btn-danger w-100 mt-2"><i class="fa fa-ban icon-margin" aria-hidden="true"></i>Cancelar</a>
        </form>
    </div>
</div>

<script src="{{ asset('js/script.js') }}"></script>

@endsection
