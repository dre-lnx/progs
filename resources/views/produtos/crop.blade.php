@stack('scripts')
@stack('styles')
@extends('templates.base')
@section('title', 'Edição de Imagem')
@section('h1', 'Edição de Imagem')

@section('content')
<div class="row">
    <div class="col-4">

        <form method="post" action="{{ route('produtos.recortar') }}" id="cortar">
            @csrf
            <input type="hidden" name="img" id="img">
            <p>
                <input type="submit" value="cortar" class="btn-primary btn"/>
            <p>
        </form>

    </div>
</div>
@endsection