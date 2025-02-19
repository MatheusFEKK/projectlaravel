<?php

namespace App\Http\Controllers;

use App\Models\ProdutoModel;
use Illuminate\Http\Request;

class Home extends Controller
{
    public function home()
    {
        $title = 'Página Inicial - Loja';
        $produtos = new ProdutoModel();


        return view('home', ['title' => $title,
                                    'produtos' => $produtos->all()
                                    ]);
    }
}
