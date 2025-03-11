<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class User extends Controller
{
    public function pesquisa()
    {
        $title = 'Página de Pesquisa - Loja';

        return view ('pesquisa', ['title' => $title]);
    }

    public function carrinho(Request $request)
    {
        $title = 'Carrinho - Loja';

        return view ('carrinho', ['title' => $title]);
    }
}
