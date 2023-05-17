<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Filme;

class filmeController extends Controller
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
                'capafilme' => 'file|required'
            ]
        );
        //dd($dadosFilme);
        
        $file = $dadosFilme['capafilme'];
        $path = $file->store('capa','public');
        $dadosFilme['capafilme'] = $path;


        Filme::create($dadosFilme);
        return Redirect::route('cadastro-filme');
    }

    
    public function buscarFilme() {
        return view('gerenciadorFilme', ['dadosfilme']); 
    }

    public function MostrarGerenciadorFilme(Request $request){
        $dadosFilme = Filme::all(); 
        //dd($dadosfuncionarios);


        $dadosFilme = Filme::query(); 
        $dadosFilme->when($request->nomefilme, function($query, $nomefilme){
            $query->where('nomefilme', 'like', '%'.$nomefilme.'%');
        });
        $dadosFilme = $dadosFilme ->get(); 


        return view('gerenciadorFilme',['dadosfilme'=>$dadosFilme]);
    }


    public function ApagarFilme(Filme $registrosFilme){
        $registrosFilme->delete();
        return Redirect::route('gerenciar-filme');
    }

    public function MostrarRegistrosFilme(Filme $registrosFilme){
        return view('xxx',['registrosFilme'=>$registrosFilme]);
    }

    public function AlterarBancoFilme(Filme  $registrosFilmes, Request $request){
        $dadosfilmes = $request->validate([
            'nomefilme'=> 'string|required',
                'atoresfilme'=> 'string|required',
                'datalancamentofilme'=> 'date|required',
                'sinopsefilme'=> 'string|required',
                'capafilme'=> 'string|required'
        ]);

        $registrosFilmes->fill($dadosfilmes);
        $registrosFilmes->save();

        return Redirect::route('gerenciar-filme');
    }
}
