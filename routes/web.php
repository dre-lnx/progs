<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', ['pagina' => 'home']);
})->name('home');

Route::get('produtos', [ProdutosController::class, 'index'])->name('produtos');

Route::get('/produtos/inserir', [ProdutosController::class, 'create'])->name(
    'produtos.inserir'
);

Route::post('/produtos/inserir', [ProdutosController::class, 'insert'])->name(
    'produtos.gravar'
);

Route::get('/produtos/{prod}', [ProdutosController::class, 'show'])->name(
    'produtos.show'
);

Route::get('/produtos/{prod}/editar', [
    ProdutosController::class,
    'edit',
])->name('produtos.edit');

Route::put('/produtos/{prod}/editar', [
    ProdutosController::class,
    'update',
])->name('produtos.update');

Route::get('/produtos/{prod}/apagar', [
    ProdutosController::class,
    'remove',
])->name('produtos.remove');

Route::delete('/produtos/{prod}/apagar', [
    ProdutosController::class,
    'delete',
])->name('produtos.delete');

Route::get('/recortar', [ProdutosController::class, 'showCrop'])->name(
    'produtos.cortar'
);

Route::get('/teste', function () {
    dd('asdasd');
});

Route::post('produtos/crop', [ProdutosController::class, 'crop'])->name(
    'produtos.recortar'
);

Route::get('usuarios', [UsuariosController::class, 'index'])->name(
    'usuarios.index'
);

Route::prefix('usuarios')->group(function () {
    Route::get('/inserir', [UsuariosController::class, 'create'])->name(
        'usuarios.inserir'
    );
    Route::post('/inserir', [UsuariosController::class, 'insert'])->name(
        'usuarios.gravar'
    );
});

Route::get('/login', [UsuariosController::class, 'login'])->name('login');
Route::post('/login', [UsuariosController::class, 'login']);

Route::get('/logout', [UsuariosController::class, 'logout'])->name('logout');

Route::get('/email/verify', function () {
    return view('auth.verify-email', ['pagina' => 'verify-email']);
})
    ->middleware('auth')
    ->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (
    EmailVerificationRequest $request
) {
    $request->fulfill();
    return redirect()->route('home');
})
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');

Route::get('profile', [UsuariosController::class, 'profile'])
    ->middleware('auth')
    ->name('usuarios.profile');

Route::get('profile/edit', [UsuariosController::class, 'editProfile'])
    ->middleware('auth')
    ->name('profile.edit');

Route::post('profile/editar', [UsuariosController::class, 'update'])
    ->middleware('auth')
    ->name('profile.update');

Route::get('profile/password', [UsuariosController::class, 'editPassword'])
    ->middleware('auth')
    ->name('profile.password');

Route::post('profile/password/edit', [
    UsuariosController::class,
    'updatePassword',
])
    ->middleware('auth')
    ->name('profile.passwordUpdate');

//Rota para enviar o usu??rio ?? home dos posts
Route::get('posts', [PostsController::class, 'index'])->name('posts');

//Rota para o formul??rio de cria????o do post
Route::get('/posts/inserir', [PostsController::class, 'create'])->name(
    'posts.inserir'
);

//Rota para salvar dados do post no banco
Route::post('/posts/inserir', [PostsController::class, 'insert'])->name(
    'posts.gravar'
);

//Rota para mostrar o post interio para o suuario
Route::get('/posts/{post}', [PostsController::class, 'show'])->name(
    'posts.show'
);
