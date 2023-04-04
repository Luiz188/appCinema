<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cadastroFilme;
use App\Http\Controllers\cadastroFuncionario;
use App\Http\Controllers\cadastroSala;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/cadastro-Filme',[cadastroFilme::class,'buscaCadastroFilme'])->name('busca-cadastro-filme');

Route::post('/cadastro-Filme',[cadastroFilme::class,'cadastrarFilme'])->name('cadastro-filme');

Route::get('/cadastro-Sala',[cadastroSala::class,'buscaCadastroSala']);

Route::get('/cadastro-funcionario',[cadastroFuncionario::class,'buscaCadastroFuncionario'])->name('busca-cadastro-funcionario');

Route::post('/cadastro-funcionario',[cadastroFuncionario::class,'cadastrarFuncionario'])->name('cadastro-funcionario');