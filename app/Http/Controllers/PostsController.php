<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    //Função para chamar posts e devolve-los para o usuário
    public function index()
    {
        return view('posts.index');
    }
}
