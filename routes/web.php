<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CidadeController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::redirect('/', '/admin/cursos');


Route::prefix('admin')->name('admin.')->group(function(){

    Route::get('cursos', [CidadeController::class, 'cidades'])->name('cidades.listar');
    Route::get('cursos/adicionar', [CidadeController::class, 'formAdicionar'])->name('cidades.form');
    Route::post('cursos/adicionar', [CidadeController::class, 'formSave'])->name('cidades.adicionar');
    Route::delete('cursos/{id}', [CidadeController::class, 'deletar'])->name('cidades.deletar');


});


Route::get('/sobre', function () {
    return '<h1>Sobre</h1>';
});
