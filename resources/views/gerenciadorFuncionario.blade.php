@extends('padrao')

@section('content')

<div class="container mt-5">

<form method="get" action="{{route('gerenciar-funcionario')}}">
  <div class="mb-3 row">
    <label for="inputPesquisar" class="col-sm-2 col-form-label">Pesquisar:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="nomefun" id="inputPesquisar" placeholder="Digite o nome do funcionário" >
    </div>
    <div class="col-sm-2"> <button type="submit" class="btn btn-outline-primary">Pesquisar</button> </div>
  </div>

</form>

<table class="table table-dark table-hover">
  <thead>
    <tr>
      <td>Codígo</td>
      <td>Nome</td>
      <td>Email</td>
      <td>Alterar</td>
      <td>Exluir</td>
    </tr>
  </thead>
  <tbody>
    @if(empty($_GET['nomefun']))
    @else
    @foreach($dadosfuncionario as $dadosfuncionarios)
    
    <tr>
      <th scope="row">{{$dadosfuncionarios->id}}</th>
      <td>{{$dadosfuncionarios->nomefun}}</td>
      <td>{{$dadosfuncionarios->emailfun}}</td>
      <td>
      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalAlterarFun-{{$dadosfuncionarios->id}}">
        Alterar
      </button>
      </td>
      <td>
      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDeleteFun-{{$dadosfuncionarios->id}}">
        Excluir
      </button>
      </td>
    </tr>

    @include('modal.funcionarioAlterar')
    @include('modal.funcionarioDeletar')

   @endforeach
  </tbody>
</table>
</div>
@endif
@endsection