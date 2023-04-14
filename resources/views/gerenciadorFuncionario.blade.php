@extends('padrao')

@section('content')

<div class="container mt-3">

<div class="mb-3 row">
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Pesquisar:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputPassword" placeholder="Por Nome">
    </div>
</div>

<table class="table table-dark table-hover">
  <thead>
    <tr>
      <th scope="col">Código</th>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">Alterar</th>
      <th scope="col">Excluir</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto@email.com</td>
      <td>X</td>
      <td>X</td>
    </tr>
    <tr>

  </tbody>
</table>
</div>
@endsection