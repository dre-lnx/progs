@extends('templates.base')
@section('title', 'Visualizar post inteiro')

@section('content')
<h1>Titulo: {{ $post->titulo }}</h1>
<img src="{{asset('img/' . $post->imagem)}}">
<p>Descrição: {{$post->descricao}}</p>
@endsection