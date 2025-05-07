<?php

use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\TesteController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;




/*Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');
*/
/*Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});
*/
require __DIR__.'/settings.php';
require __DIR__.'/auth.php';

/*Route::get('exemplo1', function(){ //cria uma nova rota
    return view('testesRota/exemplo-01');//callback(o que vai mostar na pagina)
}); Caso haja mais doque o view ou somente o view

Route::view('exemplo1',"testesRota/exemplo-01");//quando há somente o view 


Route::any('/any', function(){
    return "o tipo de rota any permite qualquer tipo de acesso http (put, delete, get, post)";
});

Route::match(["get","put"], "/match", function(){
    return "match aceita apenas os metodos passado a ele";
});

Route::get("/product/{id}/{cat}", function($id,$cat){
 return "o identificador do produte é:".$id. "<br>". "categoria do produto:". $cat;
});*/

/*Route::get("/product/{id}/{cat?}", function($id,$cat = ""){
    return "o identificador do produto é:".$id. "<br>". "categoria do produto:". $cat;
});/*os parametros passados na url ficam em {} e devem ser passados na função
quando tem {parametro?}, a função deve receber um valor default
assim não é necessario ela estar definida para que a página seja carregada*/

/*Route::get("/exemplo2", function(){
    return redirect("/exemplo1");
}); Sintaxe caso haja algo a mais na rota 

Route::redirect("exemplo2", "exemplo1");//modo simplificado com somente o redirect

//Rota nomeada
Route::get("/novidades", function(){
    return view("news");
})->name("noticias");
//Redirecionamento para a rota nomeada
Route::get("/news", function(){
    return redirect()->route("noticias");
});

//grupo de rotas
//agrupamento de rotas por prefixo
Route::prefix("admin")->group(function(){
    Route::get("dash",function(){
        return "dashboard";
    })->name('admin.dash');
    Route::get("cliente",function(){
        return "client";
    });
    Route::get("gerenciamento",function(){
        return "gerenciar";
    });
});

//Agrupamento de rotas pelo nome
Route::name("admin.")->group(function(){
    Route::get("admin/dash",function(){
        return "dashboard";
    })->name('admin.dash');
    Route::get("admin/cliente",function(){
        return "client";
    })->name('admin.cliente');
    Route::get("admin/gerenciamento",function(){
        return "gerenciar";
    })->name('admin.gerenciamento');
});

//agrupamento de rotas por nome e prefixo

//Agrupamento de rotas pelo nome
Route::group([
            'prefix' => 'admin',
            'as' => 'admin.'
],function(){
    Route::get("dash",function(){
        return "dashboard";
    })->name('dash');
    Route::get("admin/cliente",function(){
        return "client";
    })->name('cliente');
    Route::get("admin/gerenciamento",function(){
        return "gerenciar";
    })->name('gerenciamento');
});*/

//controlador camada responsavel pela logica e regras de negocios
Route::resource('produtos', ProdutoController::class);  
Route::resource('users', UserController::class);  

Route::get('/inicio', [SiteController::class, 'index'])->name('site.index')->middleware('auth');
Route::get('/produto/{slug}', [SiteController::class, 'details'])->name('site.details')->middleware('auth');
Route::get('/categoria/{id}', [SiteController::class, 'categoria'])->name('site.categoria')->middleware('auth');

Route::get('/carrinho',[CarrinhoController::class,'carrinhoLista'])->name('site.carrinho')->middleware('auth');
Route::post('/carrinho',[CarrinhoController::class,'adicionarCarrinho'])->name('site.addcarrinho');
Route::post('/remove',[CarrinhoController::class,'removeCarrinho'])->name('site.removecarrinho');
Route::post('/atualizar',[CarrinhoController::class,'atualizaCarrinho'])->name('site.atualizacarrinho');
Route::get('/limpar',[CarrinhoController::class, 'limpaCarrinho'])->name('site.limparcarrinho');

Route::view('/', 'login.form')->name('login.form');
Route::post('/auth', [loginController::class, 'auth'])->name('login.auth');
Route::get('/logout', [loginController::class, 'logout'])->name('login.logout');
Route::get('/register', [loginController::class, 'create'])->name('login.create');

Route::get('/perfil',[profileController::class, 'index'])->name('profile.view')->middleware('auth');
Route::get('/perfil/editor',[profileController::class, 'edit'])->name('profile.edit')->middleware('auth');
Route::put('/perfil/update',[profileController::class, 'update'])->name('profile.update')->middleware('auth');



Route::get('/admin/dashboard', [dashboardController::class, 'index'])->name('admin.dashboard')->middleware('auth');
Route::get('/admin/produtos', [ProdutoController::class, 'index'])->name('admin.produtos')->middleware('auth');
Route::delete('/admin/produto/delete/{id}', [ProdutoController::class, 'destroy'])->name('admin.produto.delete')->middleware('auth');
Route::delete('/admin/produto/update/{id}', [ProdutoController::class, 'update'])->name('admin.produto.update')->middleware('auth');
Route::post('/admin/produto/store', [ProdutoController::class,'store'])->name('admin.produto.store')->middleware('auth');