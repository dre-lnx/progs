@extends('templates.base')
@section('title', 'Editar Senha de Usuário')
@section('h1', 'Editar Senha')

@section('content')
<div class="row">
    <div class="col-4">

    <form method="post" action="{{ route('profile.passwordUpdate') }}">
            @csrf
            <div class="mb-3">
                <label for="nome" class="form-label">Senha Atual</label>
            <input type="password" class="form-control" id="senhaAtual" name="senhaAtual" />
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Nova Senha</label>
                <input type="password" class="form-control" id="novaSenha" name="novaSenha" />
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Nova Senha Novamente</label>
                <input type="password" class="form-control" id="novaSenhaRep" name="novaSenhaRep" />
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Atualizar Senha</button>
            </div>
        </form>

    </div>
</div>
@endsection