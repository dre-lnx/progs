@extends('templates.base')
@section('title', 'Visualizar post inteiro')

@section('content')
<div class="row"></div>
    <div class="col">
        <div class="row post-topic">
            <h1>{{ $post->titulo }}</h1>
        </div>
        <div class="row post-topic">
            <img src="{{asset('img/' . $post->imagem)}}" class="post-img">
        </div>
        <div class="row post-topic">
            <p>{{$post->descricao}}</p>
        </div>
        
    </div>
</div>
@endsection