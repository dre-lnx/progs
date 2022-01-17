<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

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

    //Função para Salvar dados no banco
    public function insert(Request $form)
    {
        $post = new Post();

        $post->titulo = $form->titulo;
        $post->descricao = $form->descricao;

        $post->save();

        return redirect()->route('posts');
    }
}
