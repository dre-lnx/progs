@extends('templates.base')
@section('title', 'Visualizar post')

@section('content')
<div class="row"></div>
    <div class="col">
        <div class="row post-topic">
            <h3>{{ $post->titulo }}</h3>
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