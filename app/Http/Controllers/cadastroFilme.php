<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cadastroFilmeModel;

class cadastroFilme extends Controller
{

    public function buscaCadastroFilme(){
        return View('cadastroFilme');
    }

    public function cadastraCadastroFilme(Request $request){
        $dadosFilme = $request->validade([
            'filme' => 'string|required',
            'atores' => 'string|required',
            'data_lancamento' => 'string|required',
            'sinopse' => 'string|required',
            'capa' => 'string|required'
        ]); 
        
        cadastroFilmeModel::create($dadosFilme);

        return Redirect::route('\home');
    }
}
