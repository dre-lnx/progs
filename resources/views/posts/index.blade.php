@extends('templates.base')
@section('title', 'Posts')
@section('h1', 'Página de Posts')

@section('content')
    <div class="row">
        <div class="col">
            <p>Sejam bem-vindos à página de posts</p>
    
            <a class="btn btn-primary" href="{{route('posts.inserir')}}" role="button">Criar Post</a>
        </div>
    </div>
@endsection