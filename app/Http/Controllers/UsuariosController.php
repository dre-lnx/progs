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

    public function profile()
    {
        $userr = Usuario::find(Auth::user()->id);
        return view('usuarios.profile', [
            'pagina' => 'perfil',
        ]);
    }

    public function editProfile()
    {
        $userr = Usuario::find(Auth::user()->id);
        return view('usuarios.editProfile', [
            'pagina' => 'editarPerfil',
        ]);
    }

    public function update(Request $form)
    {
        $usuario = Usuario::find(Auth::user()->id);

        $usuario->name = $form->name;
        $usuario->email = $form->email;
        $usuario->username = $form->username;

        $usuario->save();
        return redirect()->route('usuarios.profile');
    }

    public function editPassword()
    {
        return view('usuarios.editPassword', [
            'pagina' => 'editarSenha',
        ]);
    }

    public function updatePassword(Request $form)
    {
        $usuario = Usuario::find(Auth::user()->id);

        //Como desfazer o hash para verificar se a senha é verdadeira?

        if ($form->novaSenha == $form->novaSenhaRep) {
            $usuario->password = Hash::make($form->password);
        }

        $usuario->save();
        return redirect()->route('usuarios.profile');
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
