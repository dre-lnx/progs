@extends('templates.base')
@section('title', 'Usuários')
@section('h1', 'Página de Usuário')

@section('content')
<div class="row">
    <div class="col">
        <h1>{{ Auth::user()->username }}</h1>
    </div>
</div>

<div class="row">
            <h2>{{ Auth::user()->name }}</h2>
            <h3>{{ Auth::user()->email }}</h3>
            <div class="col">
            <a class="btn btn-primary" href="{{route('profile.edit')}}" role="button">Esqueci minha senha</a>
            </div>
            <div class="col">
                <a class="btn btn-primary" href="#" role="button">Editar dados</a>
            </div>
</div>
@endsection