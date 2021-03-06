<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @push('styles')
      <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js" integrity="sha512-ooSWpxJsiXe6t4+PPjCgYmVfr1NS5QXJACcR/FPpsdm6kqG1FmQ2SVyg2RXeVuCRBLr0lWHnWJP6Zs1Efvxzww==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @endpush
    <title>@yield('title')</title>
    <style>
      .row *{
        text-decoration: none;
      }
      .posts {
        padding-top: 20px;
      }
      .post-title{
        color: black;
      }
      .post {
        padding: 1rem;
        transition: .2s;
        border-radius:8px;
        border-top: 1px solid #d6d6d6;
      }
      .post p {
        max-width: 30ch;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
      }
      .post:hover {
        cursor: pointer;
        background-color: #d6d6d6;
      }

      .post-topic {
        padding-top: 20px;
      }

      .post-topic .post-img {
        max-width: 600px;
      }

    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  </head>
<body>

    <header class="p-3 bg-dark text-white mb-3">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="{{route('home')}}" class="nav-link px-2 @if ($pagina == 'home') text-secondary @else text-white @endif">Inicial</a></li>
          <li><a href="{{route('produtos')}}" class="nav-link px-2 @if ($pagina == 'produtos') text-secondary @else text-white @endif">Produtos</a></li>
          <li><a href="/usuarios" class="nav-link px-2 @if ($pagina == 'usuarios') text-secondary @else text-white @endif">Usu??rios</a></li>
          <li><a href="/posts" class="nav-link px-2 @if ($pagina == 'posts') text-secondary @else text-white @endif">Posts</a></li>
        </ul>

        <div class="text-end">
          @if (Auth::user())
            Ol??, <a href="{{route('usuarios.profile')}}" >{{ Auth::user()->username }}!</a>
            <a href="{{ route('logout') }}" role="button" class="btn btn-outline-danger">Sair</a>
          @else
            <a href="{{ route('login') }}" role="button" class="btn btn-outline-light me-2">Login</a>
            <a href="{{ route('usuarios.inserir') }}" role="button" class="btn btn-warning">Cadastro</a>
          @endif
        </div>
      </div>
    </div>
  </header>

    <div class="container">
        <div class="row">
            <h1>@yield('h1')</h1>
            <hr>
        </div>

        <!-- Conte??do -->
        @yield('content')

    </div>
</body>
</html>
@push('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js" integrity="sha512-ooSWpxJsiXe6t4+PPjCgYmVfr1NS5QXJACcR/FPpsdm6kqG1FmQ2SVyg2RXeVuCRBLr0lWHnWJP6Zs1Efvxzww==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush