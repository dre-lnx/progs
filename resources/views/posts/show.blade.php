@extends('templates.base')
@section('title', 'Visualizar post inteiro')

@section('content')
<h1>Titulo: {{ $post->title }}</h1>
<img src="{{asset('img/' . $post->imagem)}}">
<p>Descrição: {{$prod->descricao}}</p>
@endsection