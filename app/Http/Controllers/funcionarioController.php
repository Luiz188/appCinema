<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Funcionario;

class funcionarioController extends Controller
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
        return view('gerenciadorFuncionario',['dadosfuncionario']);
    }
  
    public function MostrarGerenciadorFuncionario(Request $request){
        $dadosfuncionario = Funcionario::all();
        //dd($dadosfuncionarios);

        
        $dadosfuncionario = Funcionario::query();
        $dadosfuncionario->when($request->nomefun,Function($query,$nomefuncionario){
            $query->where('nomefun','like','%'.$nomefuncionario.'%');
        });

        $dadosfuncionario = $dadosfuncionario->get();
    
        return view('gerenciadorFuncionario',['dadosfuncionario'=>$dadosfuncionario]);

    
    }

    public function ApagarFuncionario(Funcionario $registrosFuncionarios){
        $registrosFuncionarios->delete();
        return Redirect::route('gerenciar-funcionario');
    }

    public function MostrarRegistrosFuncionario(Funcionario $registrosFuncionarios){
        return view('xxx',['registrosFuncionarios'=>$registrosFuncionarios]);
    }

    public function AlterarBancoFuncionario(Funcionario $registrosFuncionarios, Request $request){
     $dadosfuncionario =$request->validate([
        'emailfun'=>'string|required',
        'nomefun'=>'string|required',
        'senhafun'=>'string|required',
        'whatsappfun'=>'string|required',
        'cpffun'=>'string|required'
     ]);
     $registrosFuncionarios->fill($dadosfuncionario);
     $registrosFuncionarios->save();

    return Redirect::route('gerenciar-funcionario');
    }
}