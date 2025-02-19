@extends('layouts.app')
@section('title', $title)
@section('content')
<div class="home d-flex justify-content-center align-items-center gap-5 flex-wrap">
    @forelse($produtos as $produto)
        <div class="card" style="width: 18rem;">
            <img src="{{asset('storage/uploads/'.$produto->imagem)}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$produto->nome}}</h5>
                <p class="card-text">{{$produto->descricao}}</p>
                <a href="#" class="btn btn-primary d-flex justify-content-center">Comprar</a>
            </div>
        </div>
        @empty
            <h4 class="text-danger">Nenhum produto encontrado!</h4>
    @endforelse
</div>
@endsection
