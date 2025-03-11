@extends('layouts.app')
@section('title')
@section('content')
<div class="container d-flex justify-content-center">
    <div class="home-admins pt-5 ">
        <h1>Painel de Administração</h1>
        <nav class="d-flex justify-content-center gap-5 pt-3">
            <a href="{{url('/')}}" data-bs-toggle="tooltip" data-bs-custom-class="custom-tooltip" data-bs-title="Página Inicial" data-bs-placement="bottom">
            <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
  <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z"/>
  <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z"/>
</svg>
        </a>
        <hr>
            <a href="{{url('cadastroProduto')}}" data-bs-toggle="tooltip" data-bs-custom-class="custom-tooltip" data-bs-title="Adicionar Produto" data-bs-placement="bottom">
                <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0"/>
                </svg>
            </a>
        </nav>

        <div class="pt-5 mt-5">
            <h4 class="text-center">Produtos Cadastrados</h4><br>
            <div class="pesquisaCont d-flex gap-2">
                <input class="form-control" type="text" placeholder="PESQUISAR" id="pesquisaProduto">
                <button class="btn btn-primary float-end">Pesquisar</button>
            </div>
            @if(session('success'))
                <p class="text-primary text-center p-3">{{session('success')}}</p>
            @endif
            <table class="table mt-5 pt-5">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($produtos as $produto)
                    <tr>
                        <th scope="row">{{$produto->id}}</th>
                        <td>{{$produto->nome}}</td>
                        <td>{{$produto->descricao}}</td>
                        <td>
                            <a class="btn btn-warning" href="{{route('produto.alterar',[$produto->id])}}">Editar</a>
                            <a class="btn btn-danger" href="{{route('produto.excluir', $produto->id)}}">Deletar</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="4">Nenhum Produto Encontrado!</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
