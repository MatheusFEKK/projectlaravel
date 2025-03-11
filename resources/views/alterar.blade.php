@extends('layouts.app')
@section('title', $title)
@section('content')
<div class="row">
    <h4 class="text-center p-5">Cadastro de Produtos</h4>
    <div class="col-12 d-flex justify-content-center pt-3">
            <a href="{{url('admins')}}" data-bs-toggle="tooltip" data-bs-custom-class="custom-tooltip" data-bs-title="Voltar para admins" data-bs-placement="bottom">
                <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="currentColor" class="bi bi-arrow-90deg-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708z"/>
                </svg>
            </a>
    </div>
</div>
<div class="row">
    <div class="col-12 d-flex align-items-center flex-column p-5">
        <form class="needs-validation" action="{{route('produto.atualizar', $produtos->id)}}" method="post" enctype="multipart/form-data">
            @csrf

                <div class="mb-3" style="position: relative">
                    <label for="nomeProduto" class="form-label">Produto</label>
                    <input class="form-control @if(old('nome'))  is-valid @endif @error('nome') is-invalid  @enderror" type="text" id="nomeProduto" name="nome" value="<?=$produtos->nome?>">
                    @error('nome')
                        <div class="@error('nome') invalid-tooltip @else valid-tooltip @enderror">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="mb-3" style="position: relative">
                    <label for="descricaoProduto" class="form-label">Descrição</label>
                    <input class="form-control @if (old('descricao')) is-valid @endif @error('descricao') is-invalid @enderror " type="text" id="descricaoProduto" name="descricao" value="<?=$produtos->descricao?>">
                    @error('descricao')
                        <div class="invalid-tooltip">
                            {{$message}}
                        </div>
                    @enderror
                </div>


                <div class="mb-3" style="position: relative">
                    <label for="estoqueProduto" class="form-label">Preço</label>
                    <input class="form-control @if (old('preco')) is-valid @endif @error('preco') is-invalid @enderror" type="text" id="estoqueProduto" name="preco" value="<?=$produtos->preco?>">
                    @error('preco')
                        <div class="invalid-tooltip">
                            {{$message}}
                        </div>
                    @enderror
                </div>


                <div class="mb-3" style="position: relative">
                    <label for="file-img" class="form-label">Imagem</label>
                    <input type="file" name="file-img" id="file-img" class="form-control @error('file-img') is-invalid @enderror">
                    @error('file-img')
                        <div class="invalid-tooltip">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary float-end" >Cadastrar</button>
                </div>
        </form>
    </div>
</div>













@endsection
