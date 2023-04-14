<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Funcionario;

class cadastroFuncionario extends Controller
{
    
    public function buscaCadastroFuncionario(){
        return View('cadastroFuncionario');
    }

    public function cadastrarFuncionario(Request $request){
        $dadosfuncionario = $request->validate(
            [
                'emailfun' => 'string|required',
                'nomefun' => 'string|required',
                'senhafun' => 'string|required',
                'whatsappfun' => 'string|required',
                'cpffun' => 'string|required'
            ]
        );
        Funcionario::create($dadosfuncionario);
        return Redirect::route('cadastro-funcionario');
    }

    public function buscarFuncionario(){
        return view('gerenciadorFuncionario');
    }
};