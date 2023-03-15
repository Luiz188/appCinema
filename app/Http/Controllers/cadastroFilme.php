<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class cadastroFilme extends Controller
{
    //construimos o crud aqui

    public function buscaCadastroFilme(){
        return View('cadastroFilme');
    }
}
