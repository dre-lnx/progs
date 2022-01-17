@extends('templates.base')
@section('title', 'Criar Novo Post')
@section('h1', 'Criar Post')

@section('content')
<div class="row">
    <div class="col-4">

        <form method="post" action="{{ route('posts.gravar') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nome" class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo">
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea class="form-control" id="descricao" name="descricao" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">Foto: </label>
                <input type="file" class="form-control" name="imagem" />
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Criar Post</button>
            </div>
        </form>

    </div>
</div>
@endsection