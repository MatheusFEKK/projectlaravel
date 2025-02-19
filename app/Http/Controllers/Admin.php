<?php

namespace App\Http\Controllers;

use App\Models\ProdutoModel;
use Illuminate\Http\Request;

class Admin extends Controller
{

    public function admins()
    {
        $title = 'Página de Admins - Loja';

        $produtos = ProdutoModel::all();

        return view('admins', [
            'produtos' => $produtos,
            'title' => $title
        ]);
    }

    public function cadastropg()
    {
        $title = 'Cadastro de Produtos - Loja';

        return view('cadastrar', ['title' => $title]);
    }
}

