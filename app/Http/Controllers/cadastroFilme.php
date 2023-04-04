<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Filme;

class cadastroFilme extends Controller
{

    public function buscaCadastroFilme(){
        return View('cadastroFilme');
    }

    public function cadastrarFilme(Request $request){
        $dadosFilme = $request->validate(
            [
                'nomefilme' => 'string|required',
                'atoresfilme' => 'string|required',
                'datalancamentofilme' => 'string|required',
                'sinopsefilme' => 'string|required',
                'capafilme' => 'string|required'
            ]
        ); 
        
        Filme::create($dadosFilme);
        return Redirect::route('cadastro-Filme');
    }
}
