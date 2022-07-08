<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Middleware\LogAcessoMiddleware;

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
/*
Route::get('/', function () {
    return 'Olá, seja bem vindo ao curso!';
});
*/

//-- AS ROTAS INDICAM QUE TELA EXIBIRA PRO USUARIO FINAL E O METODO QUE AQUELA ACAO INICIARA -- //
//-- EXEMPLO: Route::metodo:post,get,delete('/url', 'Controller@method')->name('site.contato'); -- //

Route::get('/', 'PrincipalController@principal')->name('site.index');
Route::post('/', 'PrincipalController@salvar')->name('site.index');

Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('site.sobrenos');

Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::post('/contato', 'ContatoController@salvar')->name('site.contato');

Route::get('/login/{erro?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');

//-- ATRIBUINDO UM MIDDLEWARE A UM GRUPO DE ROTAS --//
//-- PARA ACESSAR QUALQUER ABA DESTE GRUPO, VOCE PASSARA PELA VERIFICACAO DE USUARIO PARA CONSTRUCAO DA SESSION --//
Route::middleware('autenticacao:padrao')->prefix('/app')->group(function()
{   
    //-- ENCADEAMENTO DE MIDDLEWARES PARA PASSAR EM UM ANTES DE PASSAR NO OUTRO --//
    Route::get('/home', 'HomeController@index')->name('app.home');
    Route::get('/sair', 'LoginController@sair')->name('app.sair');

    Route::get('/fornecedor', 'FornecedorController@index')->name('app.fornecedor');
    //--LISTAGEM DOS FORNECEDORES --//
    Route::post('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
    //-- FORMULARIO DE CRIACAO DE NOVO FORNECEDOR --//
    Route::GET('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::POST('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    //-- FORMULARIOD E EDICAO DE FORNECEDOR//
    Route::get('/fornecedor/editar/{id}/{msg?}', 'FornecedorController@editar')->name('app.fornecedor.editar');
        //-- FORMULARIOD E EXCLUSAO DE FORNECEDOR//
    Route::get('/fornecedor/excluir/{id}/', 'FornecedorController@excluir')->name('app.fornecedor.excluir');

    Route::get('/produto', 'ProdutoController@index')->name('app.produto');
    Route::get('/produto/create', 'ProdutoController@create')->name('app.produto.create');
    //-- BUSCA O GRUPO DE ROTAS RELACIONADOS A CLASSE CONTROLLER E A CADA UM DE SEUS METODOS --//
    //-- PARA USAR O RESOURCE VOCE DEVE APENAS INDICAR O NOME DA ROTA E O CONTROLADOR RELACIONADO --//
    Route::resource('produto', 'ProdutoController');

    Route::resource('produto-detalhe', 'ProdutoDetalheController');

    Route::resource('cliente', 'ClienteController');
    Route::resource('pedido', 'PedidoController');
    //Route::resource('pedido-produto', 'PedidoProdutoController');

    Route::get('pedido-produto/create/{pedido}', 'PedidoProdutoController@create')->name('pedido-produto.create');
    Route::post('pedido-produto/store/{pedido}', 'PedidoProdutoController@store')->name('pedido-produto.store');
});

Route::fallback(function() {
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">clique aqui</a> para ir para página inicial';
});
