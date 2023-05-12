@extends('padrao')

@section('content')

<div class="container mt-5">

<form method="get" action="{{route('gerenciar-filme')}}">
  <div class="mb-3 row">
    <label for="inputPesquisar" class="col-sm-2 col-form-label">Pesquisar:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="nomefilme" id="inputPesquisar" placeholder="Digite o nome do filme" >
    </div>
    <div class="col-sm-2"> <button type="submit" class="btn btn-outline-primary">Pesquisar</button> </div>
  </div>

</form>

<table class="table table-dark table-hover">
  <thead>
    <tr>
      <td>Codígo</td>
      <td>Nome filme</td>
      <td>Atores Filme  </td>
      <td>Alterar</td>
      <td>Excluir</td>
    </tr>
  </thead>
  <tbody>
    @if(empty($_GET['nomefilme']))
    @else
    @foreach($dadosfilme as $dadosfilme)

    <tr>
      <th scope="row">{{$dadosfilme->id}}</th>
      <td>{{$dadosfilme->nomefilme}}</td>
      <td>{{$dadosfilme->atoresfilme}}</td>
      <td>
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalAlterarFil-{{$dadosfilme->id}}"> Alterar</button>
      </td>
      <td>
      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDeleteFil-{{$dadosfilme->id}}">
        Excluir
      </button>
      </td>
    </tr>

    @include('modal.FilmeAlterar')
    @include('modal.FilmeDeletar')

   @endforeach
  </tbody>
</table>
</div>
@endif
@endsection