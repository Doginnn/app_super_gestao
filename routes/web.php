<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'PrincipalController@principal')->name('site.index');
Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('site.sobrenos');
Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::get('/login', function() {return 'login';})->name('site.login');

//Agrupando rotas pelo prefixo "/app"
Route::prefix('/app')->group(function() {
    Route::get('/clientes', function() {return 'clientes';})->name('app.clientes');
    Route::get('/fornecedores', function() {return 'fornecedores';})->name('app.fornecedores');
    Route::get('/produtos', function() {return 'produtos';})->name('app.produtos');
});

//Redirecionamento de rotas
Route::get('/prod', function() { echo 'AMBIENTE DE PRODUÇÃO'; })->name('site.prod');
Route::get('/demo', function() { echo 'AMBIENTE DE DEMONSTRAÇÃO'; })->name('site.demo');
Route::get('/homo', function() { echo 'AMBIENTE DE HOMOLOGAÇÃO';})->name('site.homo');
Route::get('/dev', function() { echo 'AMBIENTE DE DESENVOLVIMENTO';})->name('site.dev');

//Redirecionando DEV >> PROD
//Route::get('/dev', function() {
//    return redirect()->route('site.prod');
//})->name('site.dev');

//Rota de Fallback - Quando a rota não é valida ela direciona pra outra
Route::fallback(function() {
   echo 'Oppsss... essa rota não existe, clique no botão pra voltar ao início!','<br>',
       '<a href="'.route('site.index').'">VOLTAR</a>';
});
