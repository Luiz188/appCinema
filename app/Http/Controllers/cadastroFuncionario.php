<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cadastroFuncionarioModel;

class cadastroFuncionario extends Controller
{
    public function buscaCadastroFuncionario(){
        return View('cadastroFuncionario');
    }

    public function cadastrarFuncionario (Request $request){
        $dadosfuncionario = $request->validade(
            [
                'emailfun'=> 'string|required',
                'nomefun'=> 'string|required',
                'senhafun'=> 'string|required',
                'whatsappfun'=> 'string|required',
                'cpffun'=> 'string|required'
            ]
            );
        cadastroFuncionarioModel::create($dadosfuncionario);
        return Redirect::route('/home');
    }
}
