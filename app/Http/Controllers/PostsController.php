<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    //Função para chamar posts e devolve-los para o usuário
    public function index()
    {
        return view('posts.index', ['pagina' => 'posts']);
    }

    //Função para devolver ao usuário o formulário de criação de post
    public function create()
    {
        return view('posts.create', ['pagina' => 'posts']);
    }

    public function insert()
    {
        dd('asdsad');
    }
}
