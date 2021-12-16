<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsuariosController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::orderBy('id', 'asc')->get();

        return view('usuarios.index', [
            'usuarios' => $usuarios,
            'pagina' => 'usuarios',
        ]);
    }

    public function create()
    {
        return view('usuarios.create', ['pagina' => 'usuarios']);
    }

    public function insert(Request $form)
    {
        $usuario = new Usuario();

        $usuario->name = $form->name;
        $usuario->email = $form->email;
        $usuario->username = $form->username;
        $usuario->password = Hash::make($form->password);

        $usuario->save();

        Auth::attempt(
            [
                'username' => $form->username,
                'password' => $form->password,
            ],
            $form->remember
        );

        event(new Registered($usuario));

        return redirect()->route('verification.notice');
    }

    // Ações de login
    public function login(Request $form)
    {
        if ($form->isMethod('POST')) {
            // Tenta o login
            if (
                Auth::attempt(
                    [
                        'username' => $form->username,
                        'password' => $form->password,
                    ],
                    $form->remember
                )
            ) {
                session()->regenerate();
                return redirect()->route('home');
            } else {
                // Login deu errado (usuário ou senha inválidos)
                return redirect()
                    ->route('login')
                    ->with('erro', 'Usuário ou senha inválidos.');
            }
        }
        return view('usuarios.login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('home');
    }
}
