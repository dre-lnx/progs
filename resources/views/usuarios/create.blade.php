@extends('templates.base')
@section('title', 'Inserir Usuário')
@section('h1', 'Inserir Usuário')

@section('content')
<div class="row">
    <div class="col-4">

        <form method="post" action="{{ route('usuarios.gravar') }}">
            @csrf
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>

            <div class="mb-3">
                <label for="usuario" class="form-label">Usuário</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>

            <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="admin" id="flexRadioDefault1" value="0" checked>
                <label class="form-check-label" for="flexRadioDefault1">
                  Usuário Normal
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="admin" id="flexRadioDefault2" value="1">
                <label class="form-check-label" for="flexRadioDefault2">
                  Administrador
                </label>
              </div>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Gravar</button>
            </div>
        </form>

    </div>
</div>
@endsection