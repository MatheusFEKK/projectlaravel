@extends('layouts.app')
@section('title', $title)
    @section('content')
        <div class="container d-flex justify-content-center flex-column">
            <h4>Carrinho</h4>

            <div class="cart d-flex justify-content-center align-items-center shadow rounded p-5"  style="background-color: #FBFCF8">
                    <div class="card-product d-flex flex-column shadow rounded p-3">
                            <img src="{{asset('assets/img/cosmetic-mockup.avif')}}" alt="">
                            <h5 class="text-center p-3">Produto 1</h5>
                            <button class="btn btn-primary">Comprar</button>
                    </div>
            </div>


        </div>



    @endsection
