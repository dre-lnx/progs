@extends('templates.base')
@section('title', 'Editar Dados de Usuário')
@section('h1', 'Editar Usuário')

@section('content')
<div class="row">
    <div class="col-4">

    <form method="post" action="{{ route('profile.update') }}">
            @csrf
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{Auth::user()->name}}" />
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email"  value="{{Auth::user()->email}}" />
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Atualizar Dados</button>
            </div>
        </form>

    </div>
</div>
@endsection