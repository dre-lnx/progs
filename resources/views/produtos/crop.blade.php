@extends('templates.base')
@section('title', 'Edição de Imagem')
@section('h1', 'Edição de Imagem')

@section('content')
<div class="row">
    <div class="col-4">

        <form method="post" action="{{ route('produtos.recortar') }}" enctype="multipart/form-data">
            @csrf
            <div>
            <img id="img-crop" src="{{}}"
            </div>
        </form>

    </div>
</div>
@endsection